package hamming

import (
	"fmt"
)

func Distance(text1 string, text2 string) (int, error) {
	runes1 := []rune(text1)
	runes2 := []rune(text2)

	if len(runes1) != len(runes2) {
		return -1, fmt.Errorf("'%s' and '%s' are not of equal length.", text1, text2)
	}

	distance := 0

	for i := 0; i < len(runes1); i++ {
		if runes1[i] != runes2[i] {
			distance++
		}
	}

	return distance, nil
}
