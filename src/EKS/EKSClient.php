<?php
namespace Aws\EKS;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Container Service for Kubernetes** service.
 * @method \Aws\Result associateAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result associateAccessPolicy(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     policyArn?: string,
 *     accessScope?: array{type?: 'cluster'|'namespace', namespaces?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAccessPolicyAsync(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     policyArn?: string,
 *     accessScope?: array{type?: 'cluster'|'namespace', namespaces?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateEncryptionConfig(array $args = [])
 * @phpstan-method \Aws\Result associateEncryptionConfig(array{
 *     clusterName?: string,
 *     encryptionConfig?: list<array{resources?: list<string>, provider?: array, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateEncryptionConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateEncryptionConfigAsync(array{
 *     clusterName?: string,
 *     encryptionConfig?: list<array{resources?: list<string>, provider?: array, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateIdentityProviderConfig(array $args = [])
 * @phpstan-method \Aws\Result associateIdentityProviderConfig(array{
 *     clusterName?: string,
 *     oidc?: array{
 *         identityProviderConfigName?: string,
 *         issuerUrl?: string,
 *         clientId?: string,
 *         usernameClaim?: string,
 *         usernamePrefix?: string,
 *         groupsClaim?: string,
 *         groupsPrefix?: string,
 *         requiredClaims?: array<string, string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateIdentityProviderConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateIdentityProviderConfigAsync(array{
 *     clusterName?: string,
 *     oidc?: array{
 *         identityProviderConfigName?: string,
 *         issuerUrl?: string,
 *         clientId?: string,
 *         usernameClaim?: string,
 *         usernamePrefix?: string,
 *         groupsClaim?: string,
 *         groupsPrefix?: string,
 *         requiredClaims?: array<string, string>,
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelUpdate(array $args = [])
 * @phpstan-method \Aws\Result cancelUpdate(array{name?: string, updateId?: string, clientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelUpdateAsync(array{name?: string, updateId?: string, clientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result createAccessEntry(array $args = [])
 * @phpstan-method \Aws\Result createAccessEntry(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     kubernetesGroups?: list<string>,
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     username?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessEntryAsync(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     kubernetesGroups?: list<string>,
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     username?: string,
 *     type?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAddon(array $args = [])
 * @phpstan-method \Aws\Result createAddon(array{
 *     clusterName?: string,
 *     addonName?: string,
 *     addonVersion?: string,
 *     serviceAccountRoleArn?: string,
 *     resolveConflicts?: 'NONE'|'OVERWRITE'|'PRESERVE',
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     configurationValues?: string,
 *     podIdentityAssociations?: list<array{serviceAccount?: string, roleArn?: string, ...}>,
 *     namespaceConfig?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAddonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAddonAsync(array{
 *     clusterName?: string,
 *     addonName?: string,
 *     addonVersion?: string,
 *     serviceAccountRoleArn?: string,
 *     resolveConflicts?: 'NONE'|'OVERWRITE'|'PRESERVE',
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     configurationValues?: string,
 *     podIdentityAssociations?: list<array{serviceAccount?: string, roleArn?: string, ...}>,
 *     namespaceConfig?: array{namespace?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCapability(array $args = [])
 * @phpstan-method \Aws\Result createCapability(array{
 *     capabilityName?: string,
 *     clusterName?: string,
 *     clientRequestToken?: string,
 *     type?: 'ACK'|'ARGOCD'|'KRO',
 *     roleArn?: string,
 *     configuration?: array{
 *         argoCd?: array{namespace?: string, awsIdc?: array, rbacRoleMappings?: list<array>, networkAccess?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     deletePropagationPolicy?: 'RETAIN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCapabilityAsync(array{
 *     capabilityName?: string,
 *     clusterName?: string,
 *     clientRequestToken?: string,
 *     type?: 'ACK'|'ARGOCD'|'KRO',
 *     roleArn?: string,
 *     configuration?: array{
 *         argoCd?: array{namespace?: string, awsIdc?: array, rbacRoleMappings?: list<array>, networkAccess?: array, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     deletePropagationPolicy?: 'RETAIN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     name?: string,
 *     version?: string,
 *     roleArn?: string,
 *     resourcesVpcConfig?: array{
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         endpointPublicAccess?: bool,
 *         endpointPrivateAccess?: bool,
 *         publicAccessCidrs?: list<string>,
 *         controlPlaneEgressMode?: 'AWS_MANAGED'|'CUSTOMER_ISOLATED'|'CUSTOMER_ROUTED',
 *         ...,
 *     },
 *     kubernetesNetworkConfig?: array{
 *         serviceIpv4Cidr?: string,
 *         ipFamily?: 'ipv4'|'ipv6',
 *         elasticLoadBalancing?: array{enabled?: bool, ...},
 *         ...,
 *     },
 *     logging?: array{clusterLogging?: list<array>, ...},
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     encryptionConfig?: list<array{resources?: list<string>, provider?: array, ...}>,
 *     outpostConfig?: array{
 *         outpostArns?: list<string>,
 *         controlPlaneInstanceType?: string,
 *         controlPlanePlacement?: array{groupName?: string, spreadLevel?: 'host'|'rack', ...},
 *         etcdInstanceType?: string,
 *         etcdPlacement?: array{spreadLevel?: 'host'|'rack', ...},
 *         ...,
 *     },
 *     accessConfig?: array{
 *         bootstrapClusterCreatorAdminPermissions?: bool,
 *         authenticationMode?: 'API'|'API_AND_CONFIG_MAP'|'CONFIG_MAP',
 *         ...,
 *     },
 *     bootstrapSelfManagedAddons?: bool,
 *     upgradePolicy?: array{supportType?: 'EXTENDED'|'STANDARD', ...},
 *     zonalShiftConfig?: array{enabled?: bool, ...},
 *     remoteNetworkConfig?: array{remoteNodeNetworks?: list<array>, remotePodNetworks?: list<array>, ...},
 *     computeConfig?: array{enabled?: bool, nodePools?: list<string>, nodeRoleArn?: string, ...},
 *     storageConfig?: array{blockStorage?: array{enabled?: bool, ...}, ...},
 *     deletionProtection?: bool,
 *     controlPlaneScalingConfig?: array{tier?: 'standard'|'tier-2xl'|'tier-4xl'|'tier-8xl'|'tier-xl', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     name?: string,
 *     version?: string,
 *     roleArn?: string,
 *     resourcesVpcConfig?: array{
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         endpointPublicAccess?: bool,
 *         endpointPrivateAccess?: bool,
 *         publicAccessCidrs?: list<string>,
 *         controlPlaneEgressMode?: 'AWS_MANAGED'|'CUSTOMER_ISOLATED'|'CUSTOMER_ROUTED',
 *         ...,
 *     },
 *     kubernetesNetworkConfig?: array{
 *         serviceIpv4Cidr?: string,
 *         ipFamily?: 'ipv4'|'ipv6',
 *         elasticLoadBalancing?: array{enabled?: bool, ...},
 *         ...,
 *     },
 *     logging?: array{clusterLogging?: list<array>, ...},
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     encryptionConfig?: list<array{resources?: list<string>, provider?: array, ...}>,
 *     outpostConfig?: array{
 *         outpostArns?: list<string>,
 *         controlPlaneInstanceType?: string,
 *         controlPlanePlacement?: array{groupName?: string, spreadLevel?: 'host'|'rack', ...},
 *         etcdInstanceType?: string,
 *         etcdPlacement?: array{spreadLevel?: 'host'|'rack', ...},
 *         ...,
 *     },
 *     accessConfig?: array{
 *         bootstrapClusterCreatorAdminPermissions?: bool,
 *         authenticationMode?: 'API'|'API_AND_CONFIG_MAP'|'CONFIG_MAP',
 *         ...,
 *     },
 *     bootstrapSelfManagedAddons?: bool,
 *     upgradePolicy?: array{supportType?: 'EXTENDED'|'STANDARD', ...},
 *     zonalShiftConfig?: array{enabled?: bool, ...},
 *     remoteNetworkConfig?: array{remoteNodeNetworks?: list<array>, remotePodNetworks?: list<array>, ...},
 *     computeConfig?: array{enabled?: bool, nodePools?: list<string>, nodeRoleArn?: string, ...},
 *     storageConfig?: array{blockStorage?: array{enabled?: bool, ...}, ...},
 *     deletionProtection?: bool,
 *     controlPlaneScalingConfig?: array{tier?: 'standard'|'tier-2xl'|'tier-4xl'|'tier-8xl'|'tier-xl', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEksAnywhereSubscription(array $args = [])
 * @phpstan-method \Aws\Result createEksAnywhereSubscription(array{
 *     name?: string,
 *     term?: array{duration?: int, unit?: 'MONTHS', ...},
 *     licenseQuantity?: int,
 *     licenseType?: 'Cluster',
 *     autoRenew?: bool,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEksAnywhereSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEksAnywhereSubscriptionAsync(array{
 *     name?: string,
 *     term?: array{duration?: int, unit?: 'MONTHS', ...},
 *     licenseQuantity?: int,
 *     licenseType?: 'Cluster',
 *     autoRenew?: bool,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFargateProfile(array $args = [])
 * @phpstan-method \Aws\Result createFargateProfile(array{
 *     fargateProfileName?: string,
 *     clusterName?: string,
 *     podExecutionRoleArn?: string,
 *     subnets?: list<string>,
 *     selectors?: list<array{namespace?: string, labels?: array<string, string>, ...}>,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFargateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFargateProfileAsync(array{
 *     fargateProfileName?: string,
 *     clusterName?: string,
 *     podExecutionRoleArn?: string,
 *     subnets?: list<string>,
 *     selectors?: list<array{namespace?: string, labels?: array<string, string>, ...}>,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNodegroup(array $args = [])
 * @phpstan-method \Aws\Result createNodegroup(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     scalingConfig?: array{minSize?: int, maxSize?: int, desiredSize?: int, ...},
 *     diskSize?: int,
 *     subnets?: list<string>,
 *     instanceTypes?: list<string>,
 *     amiType?: 'AL2023_ARM_64_NVIDIA'|'AL2023_ARM_64_STANDARD'|'AL2023_x86_64_NEURON'|'AL2023_x86_64_NVIDIA'|'AL2023_x86_64_STANDARD'|'AL2_ARM_64'|'AL2_x86_64'|'AL2_x86_64_GPU'|'BOTTLEROCKET_ARM_64'|'BOTTLEROCKET_ARM_64_FIPS'|'BOTTLEROCKET_ARM_64_NVIDIA'|'BOTTLEROCKET_ARM_64_NVIDIA_FIPS'|'BOTTLEROCKET_x86_64'|'BOTTLEROCKET_x86_64_FIPS'|'BOTTLEROCKET_x86_64_NVIDIA'|'BOTTLEROCKET_x86_64_NVIDIA_FIPS'|'CUSTOM'|'WINDOWS_CORE_2019_x86_64'|'WINDOWS_CORE_2022_x86_64'|'WINDOWS_CORE_2025_x86_64'|'WINDOWS_FULL_2019_x86_64'|'WINDOWS_FULL_2022_x86_64'|'WINDOWS_FULL_2025_x86_64',
 *     remoteAccess?: array{ec2SshKey?: string, sourceSecurityGroups?: list<string>, ...},
 *     nodeRole?: string,
 *     labels?: array<string, string>,
 *     taints?: list<array{key?: string, value?: string, effect?: 'NO_EXECUTE'|'NO_SCHEDULE'|'PREFER_NO_SCHEDULE', ...}>,
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     launchTemplate?: array{name?: string, version?: string, id?: string, ...},
 *     updateConfig?: array{maxUnavailable?: int, maxUnavailablePercentage?: int, updateStrategy?: 'DEFAULT'|'MINIMAL', ...},
 *     nodeRepairConfig?: array{
 *         enabled?: bool,
 *         maxUnhealthyNodeThresholdCount?: int,
 *         maxUnhealthyNodeThresholdPercentage?: int,
 *         maxParallelNodesRepairedCount?: int,
 *         maxParallelNodesRepairedPercentage?: int,
 *         nodeRepairConfigOverrides?: list<array>,
 *         ...,
 *     },
 *     capacityType?: 'CAPACITY_BLOCK'|'ON_DEMAND'|'SPOT',
 *     version?: string,
 *     releaseVersion?: string,
 *     warmPoolConfig?: array{
 *         enabled?: bool,
 *         minSize?: int,
 *         maxGroupPreparedCapacity?: int,
 *         poolState?: 'HIBERNATED'|'RUNNING'|'STOPPED',
 *         reuseOnScaleIn?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNodegroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNodegroupAsync(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     scalingConfig?: array{minSize?: int, maxSize?: int, desiredSize?: int, ...},
 *     diskSize?: int,
 *     subnets?: list<string>,
 *     instanceTypes?: list<string>,
 *     amiType?: 'AL2023_ARM_64_NVIDIA'|'AL2023_ARM_64_STANDARD'|'AL2023_x86_64_NEURON'|'AL2023_x86_64_NVIDIA'|'AL2023_x86_64_STANDARD'|'AL2_ARM_64'|'AL2_x86_64'|'AL2_x86_64_GPU'|'BOTTLEROCKET_ARM_64'|'BOTTLEROCKET_ARM_64_FIPS'|'BOTTLEROCKET_ARM_64_NVIDIA'|'BOTTLEROCKET_ARM_64_NVIDIA_FIPS'|'BOTTLEROCKET_x86_64'|'BOTTLEROCKET_x86_64_FIPS'|'BOTTLEROCKET_x86_64_NVIDIA'|'BOTTLEROCKET_x86_64_NVIDIA_FIPS'|'CUSTOM'|'WINDOWS_CORE_2019_x86_64'|'WINDOWS_CORE_2022_x86_64'|'WINDOWS_CORE_2025_x86_64'|'WINDOWS_FULL_2019_x86_64'|'WINDOWS_FULL_2022_x86_64'|'WINDOWS_FULL_2025_x86_64',
 *     remoteAccess?: array{ec2SshKey?: string, sourceSecurityGroups?: list<string>, ...},
 *     nodeRole?: string,
 *     labels?: array<string, string>,
 *     taints?: list<array{key?: string, value?: string, effect?: 'NO_EXECUTE'|'NO_SCHEDULE'|'PREFER_NO_SCHEDULE', ...}>,
 *     tags?: array<string, string>,
 *     clientRequestToken?: string,
 *     launchTemplate?: array{name?: string, version?: string, id?: string, ...},
 *     updateConfig?: array{maxUnavailable?: int, maxUnavailablePercentage?: int, updateStrategy?: 'DEFAULT'|'MINIMAL', ...},
 *     nodeRepairConfig?: array{
 *         enabled?: bool,
 *         maxUnhealthyNodeThresholdCount?: int,
 *         maxUnhealthyNodeThresholdPercentage?: int,
 *         maxParallelNodesRepairedCount?: int,
 *         maxParallelNodesRepairedPercentage?: int,
 *         nodeRepairConfigOverrides?: list<array>,
 *         ...,
 *     },
 *     capacityType?: 'CAPACITY_BLOCK'|'ON_DEMAND'|'SPOT',
 *     version?: string,
 *     releaseVersion?: string,
 *     warmPoolConfig?: array{
 *         enabled?: bool,
 *         minSize?: int,
 *         maxGroupPreparedCapacity?: int,
 *         poolState?: 'HIBERNATED'|'RUNNING'|'STOPPED',
 *         reuseOnScaleIn?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPodIdentityAssociation(array $args = [])
 * @phpstan-method \Aws\Result createPodIdentityAssociation(array{
 *     clusterName?: string,
 *     namespace?: string,
 *     serviceAccount?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     disableSessionTags?: bool,
 *     targetRoleArn?: string,
 *     policy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPodIdentityAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPodIdentityAssociationAsync(array{
 *     clusterName?: string,
 *     namespace?: string,
 *     serviceAccount?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     disableSessionTags?: bool,
 *     targetRoleArn?: string,
 *     policy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccessEntry(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessEntry(array{clusterName?: string, principalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessEntryAsync(array{clusterName?: string, principalArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAddon(array $args = [])
 * @phpstan-method \Aws\Result deleteAddon(array{clusterName?: string, addonName?: string, preserve?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAddonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAddonAsync(array{clusterName?: string, addonName?: string, preserve?: bool, ...} $args = [])
 * @method \Aws\Result deleteCapability(array $args = [])
 * @phpstan-method \Aws\Result deleteCapability(array{clusterName?: string, capabilityName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCapabilityAsync(array{clusterName?: string, capabilityName?: string, ...} $args = [])
 * @method \Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteEksAnywhereSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteEksAnywhereSubscription(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEksAnywhereSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEksAnywhereSubscriptionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result deleteFargateProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteFargateProfile(array{clusterName?: string, fargateProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFargateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFargateProfileAsync(array{clusterName?: string, fargateProfileName?: string, ...} $args = [])
 * @method \Aws\Result deleteNodegroup(array $args = [])
 * @phpstan-method \Aws\Result deleteNodegroup(array{clusterName?: string, nodegroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNodegroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNodegroupAsync(array{clusterName?: string, nodegroupName?: string, ...} $args = [])
 * @method \Aws\Result deletePodIdentityAssociation(array $args = [])
 * @phpstan-method \Aws\Result deletePodIdentityAssociation(array{clusterName?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePodIdentityAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePodIdentityAssociationAsync(array{clusterName?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result deregisterCluster(array $args = [])
 * @phpstan-method \Aws\Result deregisterCluster(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterClusterAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result describeAccessEntry(array $args = [])
 * @phpstan-method \Aws\Result describeAccessEntry(array{clusterName?: string, principalArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccessEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccessEntryAsync(array{clusterName?: string, principalArn?: string, ...} $args = [])
 * @method \Aws\Result describeAddon(array $args = [])
 * @phpstan-method \Aws\Result describeAddon(array{clusterName?: string, addonName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAddonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAddonAsync(array{clusterName?: string, addonName?: string, ...} $args = [])
 * @method \Aws\Result describeAddonConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAddonConfiguration(array{addonName?: string, addonVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAddonConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAddonConfigurationAsync(array{addonName?: string, addonVersion?: string, ...} $args = [])
 * @method \Aws\Result describeAddonVersions(array $args = [])
 * @phpstan-method \Aws\Result describeAddonVersions(array{
 *     kubernetesVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     addonName?: string,
 *     types?: list<string>,
 *     publishers?: list<string>,
 *     owners?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAddonVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAddonVersionsAsync(array{
 *     kubernetesVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     addonName?: string,
 *     types?: list<string>,
 *     publishers?: list<string>,
 *     owners?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeCapability(array $args = [])
 * @phpstan-method \Aws\Result describeCapability(array{clusterName?: string, capabilityName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCapabilityAsync(array{clusterName?: string, capabilityName?: string, ...} $args = [])
 * @method \Aws\Result describeCluster(array $args = [])
 * @phpstan-method \Aws\Result describeCluster(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result describeClusterVersions(array $args = [])
 * @phpstan-method \Aws\Result describeClusterVersions(array{
 *     clusterType?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     defaultOnly?: bool,
 *     includeAll?: bool,
 *     clusterVersions?: list<string>,
 *     status?: 'extended-support'|'standard-support'|'unsupported',
 *     versionStatus?: 'EXTENDED_SUPPORT'|'STANDARD_SUPPORT'|'UNSUPPORTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeClusterVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClusterVersionsAsync(array{
 *     clusterType?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     defaultOnly?: bool,
 *     includeAll?: bool,
 *     clusterVersions?: list<string>,
 *     status?: 'extended-support'|'standard-support'|'unsupported',
 *     versionStatus?: 'EXTENDED_SUPPORT'|'STANDARD_SUPPORT'|'UNSUPPORTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeEksAnywhereSubscription(array $args = [])
 * @phpstan-method \Aws\Result describeEksAnywhereSubscription(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEksAnywhereSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEksAnywhereSubscriptionAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result describeFargateProfile(array $args = [])
 * @phpstan-method \Aws\Result describeFargateProfile(array{clusterName?: string, fargateProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFargateProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFargateProfileAsync(array{clusterName?: string, fargateProfileName?: string, ...} $args = [])
 * @method \Aws\Result describeIdentityProviderConfig(array $args = [])
 * @phpstan-method \Aws\Result describeIdentityProviderConfig(array{clusterName?: string, identityProviderConfig?: array{type?: string, name?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIdentityProviderConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIdentityProviderConfigAsync(array{clusterName?: string, identityProviderConfig?: array{type?: string, name?: string, ...}, ...} $args = [])
 * @method \Aws\Result describeInsight(array $args = [])
 * @phpstan-method \Aws\Result describeInsight(array{clusterName?: string, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInsightAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInsightAsync(array{clusterName?: string, id?: string, ...} $args = [])
 * @method \Aws\Result describeInsightsRefresh(array $args = [])
 * @phpstan-method \Aws\Result describeInsightsRefresh(array{clusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInsightsRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeInsightsRefreshAsync(array{clusterName?: string, ...} $args = [])
 * @method \Aws\Result describeNodegroup(array $args = [])
 * @phpstan-method \Aws\Result describeNodegroup(array{clusterName?: string, nodegroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeNodegroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNodegroupAsync(array{clusterName?: string, nodegroupName?: string, ...} $args = [])
 * @method \Aws\Result describePodIdentityAssociation(array $args = [])
 * @phpstan-method \Aws\Result describePodIdentityAssociation(array{clusterName?: string, associationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePodIdentityAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePodIdentityAssociationAsync(array{clusterName?: string, associationId?: string, ...} $args = [])
 * @method \Aws\Result describeUpdate(array $args = [])
 * @phpstan-method \Aws\Result describeUpdate(array{
 *     name?: string,
 *     updateId?: string,
 *     nodegroupName?: string,
 *     addonName?: string,
 *     capabilityName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeUpdateAsync(array{
 *     name?: string,
 *     updateId?: string,
 *     nodegroupName?: string,
 *     addonName?: string,
 *     capabilityName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateAccessPolicy(array $args = [])
 * @phpstan-method \Aws\Result disassociateAccessPolicy(array{clusterName?: string, principalArn?: string, policyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAccessPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAccessPolicyAsync(array{clusterName?: string, principalArn?: string, policyArn?: string, ...} $args = [])
 * @method \Aws\Result disassociateIdentityProviderConfig(array $args = [])
 * @phpstan-method \Aws\Result disassociateIdentityProviderConfig(array{
 *     clusterName?: string,
 *     identityProviderConfig?: array{type?: string, name?: string, ...},
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateIdentityProviderConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateIdentityProviderConfigAsync(array{
 *     clusterName?: string,
 *     identityProviderConfig?: array{type?: string, name?: string, ...},
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAccessEntries(array $args = [])
 * @phpstan-method \Aws\Result listAccessEntries(array{clusterName?: string, associatedPolicyArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessEntriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessEntriesAsync(array{clusterName?: string, associatedPolicyArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAccessPolicies(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAddons(array $args = [])
 * @phpstan-method \Aws\Result listAddons(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAddonsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAddonsAsync(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listAssociatedAccessPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedAccessPolicies(array{clusterName?: string, principalArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedAccessPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedAccessPoliciesAsync(array{clusterName?: string, principalArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listCapabilities(array $args = [])
 * @phpstan-method \Aws\Result listCapabilities(array{clusterName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCapabilitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCapabilitiesAsync(array{clusterName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listClusters(array $args = [])
 * @phpstan-method \Aws\Result listClusters(array{maxResults?: int, nextToken?: string, include?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listClustersAsync(array{maxResults?: int, nextToken?: string, include?: list<string>, ...} $args = [])
 * @method \Aws\Result listEksAnywhereSubscriptions(array $args = [])
 * @phpstan-method \Aws\Result listEksAnywhereSubscriptions(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeStatus?: list<'ACTIVE'|'CREATING'|'DELETING'|'EXPIRED'|'EXPIRING'|'UPDATING'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEksAnywhereSubscriptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEksAnywhereSubscriptionsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     includeStatus?: list<'ACTIVE'|'CREATING'|'DELETING'|'EXPIRED'|'EXPIRING'|'UPDATING'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFargateProfiles(array $args = [])
 * @phpstan-method \Aws\Result listFargateProfiles(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFargateProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFargateProfilesAsync(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listIdentityProviderConfigs(array $args = [])
 * @phpstan-method \Aws\Result listIdentityProviderConfigs(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIdentityProviderConfigsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentityProviderConfigsAsync(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listInsights(array $args = [])
 * @phpstan-method \Aws\Result listInsights(array{
 *     clusterName?: string,
 *     filter?: array{
 *         categories?: list<'MISCONFIGURATION'|'ROLLBACK_READINESS'|'UPGRADE_READINESS'>,
 *         kubernetesVersions?: list<string>,
 *         statuses?: list<'ERROR'|'PASSING'|'UNKNOWN'|'WARNING'>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInsightsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInsightsAsync(array{
 *     clusterName?: string,
 *     filter?: array{
 *         categories?: list<'MISCONFIGURATION'|'ROLLBACK_READINESS'|'UPGRADE_READINESS'>,
 *         kubernetesVersions?: list<string>,
 *         statuses?: list<'ERROR'|'PASSING'|'UNKNOWN'|'WARNING'>,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNodegroups(array $args = [])
 * @phpstan-method \Aws\Result listNodegroups(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNodegroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNodegroupsAsync(array{clusterName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPodIdentityAssociations(array $args = [])
 * @phpstan-method \Aws\Result listPodIdentityAssociations(array{
 *     clusterName?: string,
 *     namespace?: string,
 *     serviceAccount?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPodIdentityAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPodIdentityAssociationsAsync(array{
 *     clusterName?: string,
 *     namespace?: string,
 *     serviceAccount?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listUpdates(array $args = [])
 * @phpstan-method \Aws\Result listUpdates(array{
 *     name?: string,
 *     nodegroupName?: string,
 *     addonName?: string,
 *     capabilityName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listUpdatesAsync(array{
 *     name?: string,
 *     nodegroupName?: string,
 *     addonName?: string,
 *     capabilityName?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerCluster(array $args = [])
 * @phpstan-method \Aws\Result registerCluster(array{
 *     name?: string,
 *     connectorConfig?: array{
 *         roleArn?: string,
 *         provider?: 'AKS'|'ANTHOS'|'EC2'|'EKS_ANYWHERE'|'GKE'|'OPENSHIFT'|'OTHER'|'RANCHER'|'TANZU',
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerClusterAsync(array{
 *     name?: string,
 *     connectorConfig?: array{
 *         roleArn?: string,
 *         provider?: 'AKS'|'ANTHOS'|'EC2'|'EKS_ANYWHERE'|'GKE'|'OPENSHIFT'|'OTHER'|'RANCHER'|'TANZU',
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startInsightsRefresh(array $args = [])
 * @phpstan-method \Aws\Result startInsightsRefresh(array{clusterName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startInsightsRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInsightsRefreshAsync(array{clusterName?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccessEntry(array $args = [])
 * @phpstan-method \Aws\Result updateAccessEntry(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     kubernetesGroups?: list<string>,
 *     clientRequestToken?: string,
 *     username?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessEntryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccessEntryAsync(array{
 *     clusterName?: string,
 *     principalArn?: string,
 *     kubernetesGroups?: list<string>,
 *     clientRequestToken?: string,
 *     username?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAddon(array $args = [])
 * @phpstan-method \Aws\Result updateAddon(array{
 *     clusterName?: string,
 *     addonName?: string,
 *     addonVersion?: string,
 *     serviceAccountRoleArn?: string,
 *     resolveConflicts?: 'NONE'|'OVERWRITE'|'PRESERVE',
 *     clientRequestToken?: string,
 *     configurationValues?: string,
 *     podIdentityAssociations?: list<array{serviceAccount?: string, roleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAddonAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAddonAsync(array{
 *     clusterName?: string,
 *     addonName?: string,
 *     addonVersion?: string,
 *     serviceAccountRoleArn?: string,
 *     resolveConflicts?: 'NONE'|'OVERWRITE'|'PRESERVE',
 *     clientRequestToken?: string,
 *     configurationValues?: string,
 *     podIdentityAssociations?: list<array{serviceAccount?: string, roleArn?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCapability(array $args = [])
 * @phpstan-method \Aws\Result updateCapability(array{
 *     clusterName?: string,
 *     capabilityName?: string,
 *     roleArn?: string,
 *     configuration?: array{argoCd?: array{rbacRoleMappings?: array, networkAccess?: array, ...}, ...},
 *     clientRequestToken?: string,
 *     deletePropagationPolicy?: 'RETAIN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCapabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCapabilityAsync(array{
 *     clusterName?: string,
 *     capabilityName?: string,
 *     roleArn?: string,
 *     configuration?: array{argoCd?: array{rbacRoleMappings?: array, networkAccess?: array, ...}, ...},
 *     clientRequestToken?: string,
 *     deletePropagationPolicy?: 'RETAIN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterConfig(array $args = [])
 * @phpstan-method \Aws\Result updateClusterConfig(array{
 *     name?: string,
 *     resourcesVpcConfig?: array{
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         endpointPublicAccess?: bool,
 *         endpointPrivateAccess?: bool,
 *         publicAccessCidrs?: list<string>,
 *         controlPlaneEgressMode?: 'AWS_MANAGED'|'CUSTOMER_ISOLATED'|'CUSTOMER_ROUTED',
 *         ...,
 *     },
 *     logging?: array{clusterLogging?: list<array>, ...},
 *     clientRequestToken?: string,
 *     accessConfig?: array{authenticationMode?: 'API'|'API_AND_CONFIG_MAP'|'CONFIG_MAP', ...},
 *     upgradePolicy?: array{supportType?: 'EXTENDED'|'STANDARD', ...},
 *     zonalShiftConfig?: array{enabled?: bool, ...},
 *     computeConfig?: array{enabled?: bool, nodePools?: list<string>, nodeRoleArn?: string, ...},
 *     kubernetesNetworkConfig?: array{
 *         serviceIpv4Cidr?: string,
 *         ipFamily?: 'ipv4'|'ipv6',
 *         elasticLoadBalancing?: array{enabled?: bool, ...},
 *         ...,
 *     },
 *     storageConfig?: array{blockStorage?: array{enabled?: bool, ...}, ...},
 *     remoteNetworkConfig?: array{remoteNodeNetworks?: list<array>, remotePodNetworks?: list<array>, ...},
 *     deletionProtection?: bool,
 *     controlPlaneScalingConfig?: array{tier?: 'standard'|'tier-2xl'|'tier-4xl'|'tier-8xl'|'tier-xl', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterConfigAsync(array{
 *     name?: string,
 *     resourcesVpcConfig?: array{
 *         subnetIds?: list<string>,
 *         securityGroupIds?: list<string>,
 *         endpointPublicAccess?: bool,
 *         endpointPrivateAccess?: bool,
 *         publicAccessCidrs?: list<string>,
 *         controlPlaneEgressMode?: 'AWS_MANAGED'|'CUSTOMER_ISOLATED'|'CUSTOMER_ROUTED',
 *         ...,
 *     },
 *     logging?: array{clusterLogging?: list<array>, ...},
 *     clientRequestToken?: string,
 *     accessConfig?: array{authenticationMode?: 'API'|'API_AND_CONFIG_MAP'|'CONFIG_MAP', ...},
 *     upgradePolicy?: array{supportType?: 'EXTENDED'|'STANDARD', ...},
 *     zonalShiftConfig?: array{enabled?: bool, ...},
 *     computeConfig?: array{enabled?: bool, nodePools?: list<string>, nodeRoleArn?: string, ...},
 *     kubernetesNetworkConfig?: array{
 *         serviceIpv4Cidr?: string,
 *         ipFamily?: 'ipv4'|'ipv6',
 *         elasticLoadBalancing?: array{enabled?: bool, ...},
 *         ...,
 *     },
 *     storageConfig?: array{blockStorage?: array{enabled?: bool, ...}, ...},
 *     remoteNetworkConfig?: array{remoteNodeNetworks?: list<array>, remotePodNetworks?: list<array>, ...},
 *     deletionProtection?: bool,
 *     controlPlaneScalingConfig?: array{tier?: 'standard'|'tier-2xl'|'tier-4xl'|'tier-8xl'|'tier-xl', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateClusterVersion(array $args = [])
 * @phpstan-method \Aws\Result updateClusterVersion(array{
 *     name?: string,
 *     version?: string,
 *     clientRequestToken?: string,
 *     force?: bool,
 *     rollbackConfig?: array{timeoutMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateClusterVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateClusterVersionAsync(array{
 *     name?: string,
 *     version?: string,
 *     clientRequestToken?: string,
 *     force?: bool,
 *     rollbackConfig?: array{timeoutMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEksAnywhereSubscription(array $args = [])
 * @phpstan-method \Aws\Result updateEksAnywhereSubscription(array{id?: string, autoRenew?: bool, clientRequestToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEksAnywhereSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEksAnywhereSubscriptionAsync(array{id?: string, autoRenew?: bool, clientRequestToken?: string, ...} $args = [])
 * @method \Aws\Result updateNodegroupConfig(array $args = [])
 * @phpstan-method \Aws\Result updateNodegroupConfig(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     labels?: array{addOrUpdateLabels?: array<string, string>, removeLabels?: list<string>, ...},
 *     taints?: array{addOrUpdateTaints?: list<array>, removeTaints?: list<array>, ...},
 *     scalingConfig?: array{minSize?: int, maxSize?: int, desiredSize?: int, ...},
 *     updateConfig?: array{maxUnavailable?: int, maxUnavailablePercentage?: int, updateStrategy?: 'DEFAULT'|'MINIMAL', ...},
 *     nodeRepairConfig?: array{
 *         enabled?: bool,
 *         maxUnhealthyNodeThresholdCount?: int,
 *         maxUnhealthyNodeThresholdPercentage?: int,
 *         maxParallelNodesRepairedCount?: int,
 *         maxParallelNodesRepairedPercentage?: int,
 *         nodeRepairConfigOverrides?: list<array>,
 *         ...,
 *     },
 *     warmPoolConfig?: array{
 *         enabled?: bool,
 *         minSize?: int,
 *         maxGroupPreparedCapacity?: int,
 *         poolState?: 'HIBERNATED'|'RUNNING'|'STOPPED',
 *         reuseOnScaleIn?: bool,
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNodegroupConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNodegroupConfigAsync(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     labels?: array{addOrUpdateLabels?: array<string, string>, removeLabels?: list<string>, ...},
 *     taints?: array{addOrUpdateTaints?: list<array>, removeTaints?: list<array>, ...},
 *     scalingConfig?: array{minSize?: int, maxSize?: int, desiredSize?: int, ...},
 *     updateConfig?: array{maxUnavailable?: int, maxUnavailablePercentage?: int, updateStrategy?: 'DEFAULT'|'MINIMAL', ...},
 *     nodeRepairConfig?: array{
 *         enabled?: bool,
 *         maxUnhealthyNodeThresholdCount?: int,
 *         maxUnhealthyNodeThresholdPercentage?: int,
 *         maxParallelNodesRepairedCount?: int,
 *         maxParallelNodesRepairedPercentage?: int,
 *         nodeRepairConfigOverrides?: list<array>,
 *         ...,
 *     },
 *     warmPoolConfig?: array{
 *         enabled?: bool,
 *         minSize?: int,
 *         maxGroupPreparedCapacity?: int,
 *         poolState?: 'HIBERNATED'|'RUNNING'|'STOPPED',
 *         reuseOnScaleIn?: bool,
 *         ...,
 *     },
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNodegroupVersion(array $args = [])
 * @phpstan-method \Aws\Result updateNodegroupVersion(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     version?: string,
 *     releaseVersion?: string,
 *     launchTemplate?: array{name?: string, version?: string, id?: string, ...},
 *     force?: bool,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNodegroupVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNodegroupVersionAsync(array{
 *     clusterName?: string,
 *     nodegroupName?: string,
 *     version?: string,
 *     releaseVersion?: string,
 *     launchTemplate?: array{name?: string, version?: string, id?: string, ...},
 *     force?: bool,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePodIdentityAssociation(array $args = [])
 * @phpstan-method \Aws\Result updatePodIdentityAssociation(array{
 *     clusterName?: string,
 *     associationId?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     disableSessionTags?: bool,
 *     targetRoleArn?: string,
 *     policy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePodIdentityAssociationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePodIdentityAssociationAsync(array{
 *     clusterName?: string,
 *     associationId?: string,
 *     roleArn?: string,
 *     clientRequestToken?: string,
 *     disableSessionTags?: bool,
 *     targetRoleArn?: string,
 *     policy?: string,
 *     ...,
 * } $args = [])
 */
class EKSClient extends AwsClient {}
