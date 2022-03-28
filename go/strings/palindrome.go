package palindrome

import (
	"regexp"
	"strings"
)

// IsPalindrome checks whether a string is a palindrome while disregarding all
// non-alphanumeric characters and capitalization.
func IsPalindrome(text string) bool {
	regex, _ := regexp.Compile(`[^\p{L}\p{N}]+`)
	runes := []rune(regex.ReplaceAllString(strings.ToLower(text), ""))
	length := len(runes)

	for i, rune := range runes[:length/2] {
		if rune != runes[length-i-1] {
			return false
		}
	}

	return true
}
