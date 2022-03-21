package palindrome

import (
	"testing"
)

func TestIsPalindrome(t *testing.T) {
	for _, palindrome := range []string{
		"anna",
		"racecar",
	} {
		if !IsPalindrome(palindrome) {
			t.Errorf("Should consider '%s' as palindrome.", palindrome)
		}
	}

	for _, nonPalindrome := range []string{
		"banana",
		"blueprint",
	} {
		if IsPalindrome(nonPalindrome) {
			t.Errorf("Should not consider '%s' as palindrome.", nonPalindrome)
		}
	}
}
