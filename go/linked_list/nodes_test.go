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
		t.Errorf("Should return tail for head next, got '%v'", head.next)
	}
}

func TestNewDoublyNode(t *testing.T) {
	mid := NewDoublyNode("a", nil, nil)

	if mid.data != "a" {
		t.Errorf("Should return 'a' for mid data, got '%v'", mid.data)
	}

	if mid.next != nil {
		t.Errorf("Should return 'nil' for mid next, got '%v'", mid.next)
	}

	if mid.prev != nil {
		t.Errorf("Should return 'nil' for mid prev, got '%v'", mid.prev)
	}

	head := NewDoublyNode("b", mid, nil)
	mid.prev = head
	tail := NewDoublyNode("c", nil, mid)
	mid.next = tail

	nodes := []*DoublyNode{head, mid, tail}
	size := len(nodes) - 1

	for i, node := range nodes {
		if i == size && node.next != nil {
			t.Errorf("Should return 'nil' for node next, got '%v'", node.next)
		}

		if i == 0 && node.prev != nil {
			t.Errorf("Should return 'nil' for node prev, got '%v'", node.prev)
		}

		if i != size && node.next != nodes[i+1] {
			t.Errorf(
				"Should return '%v' for node next, got '%v'",
				nodes[i+1],
				node.next,
			)
		}

		if i != 0 && node.prev != nodes[i-1] {
			t.Errorf(
				"Should return '%v' for node prev, got '%v'",
				nodes[i-1],
				node.prev,
			)
		}
	}
}
