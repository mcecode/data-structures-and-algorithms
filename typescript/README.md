# TypeScript

This directory contains LeetCode problems' answers ([`leetcode`](leetcode)) written in TypeScript and helper code for running tests ([`test.ts`](test.ts)) on them.

## Testing

The code in this directory has been tested using Deno version 1.45. It may run with other Deno versions, but there is no guarantee.

To execute all tests, run the following command:

```console
deno run --check --allow-read test.ts
```

To execute tests for specific files, specify the files to test:

```console
deno run --check --allow-read test.ts leetcode/1-two-sum.ts
```
