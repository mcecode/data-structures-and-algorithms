package stack

import (
	"testing"
)

const emptyStackError string = "stack is empty"

func TestEmptyStack(t *testing.T) {
	top, err := Peek()

	if top != nil || err.Error() != emptyStackError {
		t.Error("Should return values that indicate stack is empty")
	}
}

func TestPush(t *testing.T) {
	Push("a")
	top, err := Peek()

	if top != "a" {
		t.Errorf("Should return 'a' for top, got '%v'", top)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	Push("b")
	Push("c")
	top, err = Peek()

	if top != "c" {
		t.Errorf("Should return 'c' for top, got '%v'", top)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}
}

func TestPop(t *testing.T) {
	data, err := Pop()

	if data != "c" {
		t.Errorf("Should return 'c' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	top, err := Peek()

	if top != "b" {
		t.Errorf("Should return 'b' for top, got '%v'", top)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	Pop()
	data, err = Pop()

	if data != "a" {
		t.Errorf("Should return 'a' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	data, err = Pop()

	if data != nil {
		t.Errorf("Should return 'nil' for data, got '%v'", data)
	}

	if err.Error() != emptyStackError {
		t.Errorf("Should return '%s' for err, got '%v'", emptyStackError, err)
	}
}

func TestLen(t *testing.T) {
	if initialLen := Len(); initialLen != 0 {
		t.Errorf("Should return '0', got '%d'", initialLen)
	}

	Push("a")
	Push("b")
	Push("c")

	if newLen := Len(); newLen != 3 {
		t.Errorf("Should return '3', got '%d'", newLen)
	}
}
