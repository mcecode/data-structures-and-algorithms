package palindrome

import (
	"testing"
)

func TestIsPalindrome(t *testing.T) {
	for _, palindrome := range []string{
		"",
		"a",
		"3/22/2223",
		"৯৮৭৬৬৭৮৯",
		"Able was I ere I saw Elba.",
		"Коту скоро сорок суток!",
		"水山处明秀秀明处山水。",
	} {
		if !IsPalindrome(palindrome) {
			t.Errorf("Should consider '%s' as a palindrome.", palindrome)
		}
	}

	for _, nonPalindrome := range []string{
		"4/25/2172",
		"১২৩৪৫৬৭৮",
		"Did you see me climb this tree?",
		"Знаешь, я принимаю кофе и аспирин.",
		"我感到生活再也无法忍受。",
	} {
		if IsPalindrome(nonPalindrome) {
			t.Errorf("Should not consider '%s' as a palindrome.", nonPalindrome)
		}
	}
}
