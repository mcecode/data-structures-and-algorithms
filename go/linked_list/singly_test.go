package linkedlist

import (
	"testing"
)

func TestNewSingly(t *testing.T) {
	s := NewSingly()

	if s.head != nil {
		t.Errorf("Should return 'nil' for head, got '%v'", s.head)
	}

	if s.tail != nil {
		t.Errorf("Should return 'nil' for tail, got '%v'", s.tail)
	}
}

func TestSInsertHead(t *testing.T) {
	s := NewSingly()
	nodes := []*SinglyNode{
		s.InsertHead(0),
		s.InsertHead(1),
		s.InsertHead(2),
		s.InsertHead(3),
		s.InsertHead(4),
	}
	len := len(nodes) - 1

	if s.head != nodes[len] {
		t.Errorf("Should return '%v' for head, got '%v'", nodes[len], s.head)
	}

	if s.tail != nodes[0] {
		t.Errorf("Should return '%v' for tail, got '%v'", nodes[0], s.tail)
	}

	if s.tail.next != nil {
		t.Errorf("Should return 'nil' for tail next, got '%v'", s.tail.next)
	}

	for i, node := range nodes {
		if node.data != i {
			t.Errorf("Should return '%d' for node data, got '%v'", i, node.data)
		}

		if i != 0 && node.next != nodes[i-1] {
			t.Errorf(
				"Should return '%v' for node next, got '%v'",
				nodes[i-1],
				node.next,
			)
		}
	}
}

func TestSInsertTail(t *testing.T) {
	s := NewSingly()

	var head *SinglyNode
	var prev *SinglyNode

	for i, value := range []string{"a", "b", "c", "d", "e"} {
		tail := s.InsertTail(value)

		if i == 0 {
			head = tail
		}

		if tail.data != value {
			t.Errorf("Should return '%s' for tail data, got '%v'", value, tail.data)
		}

		if tail.next != nil {
			t.Errorf("Should return 'nil' for tail next, got '%v'", tail.next)
		}

		if i != 0 && prev.next != tail {
			t.Errorf("Should return '%v' for prev next, got '%v'", tail, prev.next)
		}

		if s.head != head {
			t.Errorf("Should return '%v' for head, got '%v'", head, s.head)
		}

		if s.tail != tail {
			t.Errorf("Should return '%v' for tail, got '%v'", tail, s.tail)
		}

		prev = tail
	}
}

func TestSDeleteHead(t *testing.T) {
	s := NewSingly()

	oldHead := s.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for old head, got '%v'", oldHead)
	}

	nodes := []*SinglyNode{
		s.InsertTail("a"),
		s.InsertTail("b"),
		s.InsertTail("c"),
		s.InsertTail("d"),
		s.InsertTail("e"),
	}
	len := len(nodes) - 1

	for i, node := range nodes {
		oldHead = s.DeleteHead()

		if oldHead != node {
			t.Errorf("Should return '%v' for old head, got '%v'", node, oldHead)
		}

		if i != len {
			if s.head != nodes[i+1] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[i+1], s.head)
			}

			if s.tail != nodes[len] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[len], s.tail)
			}
		}

		if i == len-1 && s.head != s.tail {
			t.Errorf(
				"Should return same values for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}

		if i == len && (s.head != nil || s.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}
	}
}

func TestSDeleteTail(t *testing.T) {
	s := NewSingly()

	oldTail := s.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for old tail, got '%v'", oldTail)
	}

	nodes := []*SinglyNode{
		s.InsertHead("a"),
		s.InsertHead("b"),
		s.InsertHead("c"),
		s.InsertHead("d"),
		s.InsertHead("e"),
	}
	len := len(nodes) - 1

	for i, node := range nodes {
		oldTail = s.DeleteTail()

		if oldTail != node {
			t.Errorf("Should return '%v' for old tail, got '%v'", node, oldTail)
		}

		if i != len {
			if s.head != nodes[len] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[len], s.head)
			}

			if s.tail != nodes[i+1] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[i+1], s.tail)
			}
		}

		if i == len-1 && s.head != s.tail {
			t.Errorf(
				"Should return same values for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}

		if i == len && (s.head != nil || s.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}
	}
}

func TestSLen(t *testing.T) {
	s := NewSingly()

	if len := s.Len(); len != 0 {
		t.Errorf("Should return '0', got '%v'", len)
	}

	s.InsertHead("a")
	s.InsertHead("b")
	s.InsertHead("c")

	if len := s.Len(); len != 3 {
		t.Errorf("Should return '3', got '%v'", len)
	}
}
