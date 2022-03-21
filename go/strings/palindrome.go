package palindrome

func IsPalindrome(text string) bool {
	parts := []rune(text)
	partsLength := len(parts) - 1

	for i, part := range parts {
		if part != parts[partsLength-i] {
			return false
		}
	}

	return true
}
