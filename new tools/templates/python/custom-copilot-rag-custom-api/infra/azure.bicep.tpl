@maxLength(20)
@minLength(4)
@description('Used to generate names for all resources in this file')
param resourceBaseName string

@description('Required when create Azure Bot service')
param botAadAppClientId string

@secure()
@description('Required by Bot Framework package in your bot project')
param botAadAppClientSecret string

{{#useOpenAI}}
@secure()
param openAIKey string
{{/useOpenAI}}
{{#useAzureOpenAI}}
@secure()
param azureOpenAIKey string

@secure()
param azureOpenAIEndpoint string

@secure()
param azureOpenAIDeployment string
{{/useAzureOpenAI}}


param webAppSKU string
param linuxFxVersion string

@maxLength(42)
param botDisplayName string

param serverfarmsName string = resourceBaseName
param webAppName string = resourceBaseName
param location string = resourceGroup().location
param pythonVersion string = linuxFxVersion

// Compute resources for your Web App
resource serverfarm 'Microsoft.Web/serverfarms@2021-02-01' = {
  kind: 'app,linux'
  location: location
  name: serverfarmsName
  sku: {
    name: webAppSKU
  }
  properties:{
    reserved: true
  }
}

// Web App that hosts your bot
resource webApp 'Microsoft.Web/sites@2021-02-01' = {
  kind: 'app,linux'
  location: location
  name: webAppName
  properties: {
    serverFarmId: serverfarm.id
    siteConfig: {
      alwaysOn: true
      appCommandLine: 'gunicorn --bind 0.0.0.0 --worker-class aiohttp.worker.GunicornWebWorker --timeout 600 --chdir src app:app'
      linuxFxVersion: pythonVersion
      appSettings: [
        {
          name: 'WEBSITES_CONTAINER_START_TIME_LIMIT'
          value: '600'
        }
        {
          name: 'SCM_DO_BUILD_DURING_DEPLOYMENT'
          value: 'true'
        }
        {
          name: 'BOT_ID'
          value: botAadAppClientId
        }
        {
          name: 'BOT_PASSWORD'
          value: botAadAppClientSecret
        }
        {{#useOpenAI}}
        {
          name: 'OPENAI_API_KEY'
          value: openAIKey
        }
        {{/useOpenAI}}
        {{#useAzureOpenAI}}
        {
          name: 'AZURE_OPENAI_API_KEY'
          value: azureOpenAIKey
        }
        {
          name: 'AZURE_OPENAI_ENDPOINT'
          value: azureOpenAIEndpoint
        }
        {
          name: 'AZURE_OPENAI_DEPLOYMENT'
          value: azureOpenAIDeployment
        }
        {{/useAzureOpenAI}}
      ]
      ftpsState: 'FtpsOnly'
    }
  }
}

// Register your web service as a bot with the Bot Framework
module azureBotRegistration './botRegistration/azurebot.bicep' = {
  name: 'Azure-Bot-registration'
  params: {
    resourceBaseName: resourceBaseName
    botAadAppClientId: botAadAppClientId
    botAppDomain: webApp.properties.defaultHostName
    botDisplayName: botDisplayName
  }
}

// The output will be persisted in .env.{envName}. Visit https://aka.ms/teamsfx-actions/arm-deploy for more details.
output BOT_AZURE_APP_SERVICE_RESOURCE_ID string = webApp.id
output BOT_DOMAIN string = webApp.properties.defaultHostName
