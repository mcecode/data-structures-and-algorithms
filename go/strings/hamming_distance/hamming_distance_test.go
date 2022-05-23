package hamming

import (
	"fmt"
	"testing"
)

func TestDistance(t *testing.T) {
	for _, testCase := range []struct{ text1, text2 string }{
		{"abc", "abcd"},
		{"абв", "ГДЕЁЖ"},
		{"民県政相意党", "会長国生"},
	} {
		_, err := Distance(testCase.text1, testCase.text2)
		notEqualError := fmt.Sprintf(
			"'%s' and '%s' are not of equal length",
			testCase.text1,
			testCase.text2,
		)

		if err == nil || err.Error() != notEqualError {
			t.Errorf(
				"Should return an error when passing '%s' and '%s'",
				testCase.text1,
				testCase.text2,
			)
		}
	}

	for _, testCase := range []struct {
		text1, text2 string
		distance     int
	}{
		{"abc", "abc", 0},
		{"Bind", "Bang", 2},
		{"абвгдеёж", "абвГдеёж", 1},
		{"会長国生東", "県政相意党", 5},
	} {
		distance, _ := Distance(testCase.text1, testCase.text2)
		if distance != testCase.distance {
			t.Errorf(
				"Should give a distance of '%d', got '%d'",
				testCase.distance,
				distance,
			)
		}
	}
}
