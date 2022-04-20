package linkedlist

import (
	"testing"
)

func TestNewSinglyNode(t *testing.T) {
	tail := NewSinglyNode("a", nil)

	if tail.data != "a" {
		t.Errorf("Should return 'a' for tail data, got '%v'", tail.data)
	}

	if tail.next != nil {
		t.Errorf("Should return 'nil' for tail next, got '%v'", tail.next)
	}

	head := NewSinglyNode("b", tail)

	if head.next != tail {
		t.Errorf("Should return tail value for head next, got '%v'", head.next)
	}
}
