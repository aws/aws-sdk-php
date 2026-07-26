<?php
namespace Aws\ManagedBlockchainQuery;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Blockchain Query** service.
 * @method \Aws\Result batchGetTokenBalance(array $args = [])
 * @phpstan-method \Aws\Result batchGetTokenBalance(array{
 *     getTokenBalanceInputs?: list<array{tokenIdentifier?: array, ownerIdentifier?: array, atBlockchainInstant?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetTokenBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetTokenBalanceAsync(array{
 *     getTokenBalanceInputs?: list<array{tokenIdentifier?: array, ownerIdentifier?: array, atBlockchainInstant?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAssetContract(array $args = [])
 * @phpstan-method \Aws\Result getAssetContract(array{
 *     contractIdentifier?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetContractAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssetContractAsync(array{
 *     contractIdentifier?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTokenBalance(array $args = [])
 * @phpstan-method \Aws\Result getTokenBalance(array{
 *     tokenIdentifier?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         tokenId?: string,
 *         ...,
 *     },
 *     ownerIdentifier?: array{address?: string, ...},
 *     atBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTokenBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTokenBalanceAsync(array{
 *     tokenIdentifier?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         tokenId?: string,
 *         ...,
 *     },
 *     ownerIdentifier?: array{address?: string, ...},
 *     atBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTransaction(array $args = [])
 * @phpstan-method \Aws\Result getTransaction(array{
 *     transactionHash?: string,
 *     transactionId?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getTransactionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTransactionAsync(array{
 *     transactionHash?: string,
 *     transactionId?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAssetContracts(array $args = [])
 * @phpstan-method \Aws\Result listAssetContracts(array{
 *     contractFilter?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         tokenStandard?: 'ERC1155'|'ERC20'|'ERC721',
 *         deployerAddress?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetContractsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssetContractsAsync(array{
 *     contractFilter?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         tokenStandard?: 'ERC1155'|'ERC20'|'ERC721',
 *         deployerAddress?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listFilteredTransactionEvents(array $args = [])
 * @phpstan-method \Aws\Result listFilteredTransactionEvents(array{
 *     network?: string,
 *     addressIdentifierFilter?: array{transactionEventToAddress?: list<string>, ...},
 *     timeFilter?: array{
 *         from?: array{time?: int|string|\DateTimeInterface, ...},
 *         to?: array{time?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     voutFilter?: array{voutSpent?: bool, ...},
 *     confirmationStatusFilter?: array{include?: list<'FINAL'|'NONFINAL'>, ...},
 *     sort?: array{sortBy?: 'blockchainInstant', sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listFilteredTransactionEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFilteredTransactionEventsAsync(array{
 *     network?: string,
 *     addressIdentifierFilter?: array{transactionEventToAddress?: list<string>, ...},
 *     timeFilter?: array{
 *         from?: array{time?: int|string|\DateTimeInterface, ...},
 *         to?: array{time?: int|string|\DateTimeInterface, ...},
 *         ...,
 *     },
 *     voutFilter?: array{voutSpent?: bool, ...},
 *     confirmationStatusFilter?: array{include?: list<'FINAL'|'NONFINAL'>, ...},
 *     sort?: array{sortBy?: 'blockchainInstant', sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTokenBalances(array $args = [])
 * @phpstan-method \Aws\Result listTokenBalances(array{
 *     ownerFilter?: array{address?: string, ...},
 *     tokenFilter?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         tokenId?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTokenBalancesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTokenBalancesAsync(array{
 *     ownerFilter?: array{address?: string, ...},
 *     tokenFilter?: array{
 *         network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *         contractAddress?: string,
 *         tokenId?: string,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTransactionEvents(array $args = [])
 * @phpstan-method \Aws\Result listTransactionEvents(array{
 *     transactionHash?: string,
 *     transactionId?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTransactionEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTransactionEventsAsync(array{
 *     transactionHash?: string,
 *     transactionId?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTransactions(array $args = [])
 * @phpstan-method \Aws\Result listTransactions(array{
 *     address?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     fromBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     toBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     sort?: array{sortBy?: 'TRANSACTION_TIMESTAMP', sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     confirmationStatusFilter?: array{include?: list<'FINAL'|'NONFINAL'>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTransactionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTransactionsAsync(array{
 *     address?: string,
 *     network?: 'BITCOIN_MAINNET'|'BITCOIN_TESTNET'|'ETHEREUM_MAINNET'|'ETHEREUM_SEPOLIA_TESTNET',
 *     fromBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     toBlockchainInstant?: array{time?: int|string|\DateTimeInterface, ...},
 *     sort?: array{sortBy?: 'TRANSACTION_TIMESTAMP', sortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     nextToken?: string,
 *     maxResults?: int,
 *     confirmationStatusFilter?: array{include?: list<'FINAL'|'NONFINAL'>, ...},
 *     ...,
 * } $args = [])
 */
class ManagedBlockchainQueryClient extends AwsClient {}
