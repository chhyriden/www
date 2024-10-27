// Copyright (c) Microsoft Corporation.
// Licensed under the MIT license.

/****************************************************************************************
 *                            NOTICE: AUTO-GENERATED                                    *
 ****************************************************************************************
 * This file is automatically generated by script "./src/question/generator.ts".        *
 * Please don't manually change its contents, as any modifications will be overwritten! *
 ***************************************************************************************/

import { CLICommandOption, CLICommandArgument } from "@microsoft/teamsfx-api";

export const SelectTeamsManifestOptions: CLICommandOption[] = [
  {
    name: "teams-manifest-file",
    questionName: "manifest-path",
    type: "string",
    shortName: "t",
    description:
      "Specify the path for Teams app manifest template. It can be either absolute path or relative path to the project root folder, with default at './appPackage/manifest.json'",
    required: true,
    default: "./appPackage/manifest.json",
  },
];
export const SelectTeamsManifestArguments: CLICommandArgument[] = [];