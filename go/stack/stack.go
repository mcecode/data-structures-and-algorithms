package stack

import (
	"errors"
)

var stack []interface{}
var errEmptyStack error = errors.New("stack is empty")

func Peek() (interface{}, error) {
	if Len() > 0 {
		return stack[Len()-1], nil
	}

	return nil, errEmptyStack
}

func Push(value interface{}) {
	stack = append(stack, value)
}

func Pop() (interface{}, error) {
	if Len() > 0 {
		data := stack[Len()-1]
		stack = stack[0 : Len()-1]
		return data, nil
	}

	return nil, errEmptyStack
}

func Len() int {
	return len(stack)
}
