# Go

This directory contains data structures ([`queue`](queue), [`stack`](stack), [`linked_list`](linked_list)) and algorithms ([`strings`](strings)) written in Go.

## Testing

The code in this directory has been tested using Go version 1.22. It may run with other Go versions, but there is no guarantee.

To execute the tests, run the following command:

```console
go test ./...
```

To execute tests for specific packages, specify the relative path of the package directories to test:

```console
go test ./strings/palindrome
```
