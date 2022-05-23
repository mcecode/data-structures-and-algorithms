package palindrome

import (
	"regexp"
	"strings"
)

// Is checks whether a string is a palindrome while disregarding all
// non-alphanumeric characters and capitalization.
func Is(text string) bool {
	regex, _ := regexp.Compile(`[^\p{L}\p{N}]+`)
	runes := []rune(regex.ReplaceAllString(strings.ToLower(text), ""))
	count := len(runes)

	for i, rune := range runes[:count/2] {
		if rune != runes[count-i-1] {
			return false
		}
	}

	return true
}
