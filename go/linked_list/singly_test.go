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
	size := len(nodes) - 1

	if s.head != nodes[size] {
		t.Errorf("Should return '%v' for head, got '%v'", nodes[size], s.head)
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
	nodes := []*SinglyNode{
		s.InsertTail(0),
		s.InsertTail(1),
		s.InsertTail(2),
		s.InsertTail(3),
		s.InsertTail(4),
	}
	size := len(nodes) - 1

	if s.head != nodes[0] {
		t.Errorf("Should return '%v' for head, got '%v'", nodes[0], s.head)
	}

	if s.tail != nodes[size] {
		t.Errorf("Should return '%v' for tail, got '%v'", nodes[size], s.tail)
	}

	if s.tail.next != nil {
		t.Errorf("Should return 'nil' for tail next, got '%v'", s.tail.next)
	}

	for i, node := range nodes {
		if node.data != i {
			t.Errorf("Should return '%d' for node data, got '%v'", i, node.data)
		}

		if i != size && node.next != nodes[i+1] {
			t.Errorf(
				"Should return '%v' for node next, got '%v'",
				nodes[i+1],
				node.next,
			)
		}
	}
}

func TestSDeleteHead(t *testing.T) {
	s := NewSingly()

	oldHead := s.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for old head, got '%v'", oldHead)
	}

	nodes := []*SinglyNode{
		s.InsertTail(0),
		s.InsertTail(1),
		s.InsertTail(2),
		s.InsertTail(3),
		s.InsertTail(4),
	}
	size := len(nodes) - 1

	for i, node := range nodes {
		oldHead = s.DeleteHead()

		if oldHead != node {
			t.Errorf("Should return '%v' for old head, got '%v'", node, oldHead)
		}

		if i != size {
			if s.head != nodes[i+1] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[i+1], s.head)
			}

			if s.tail != nodes[size] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[size], s.tail)
			}

			if s.tail.next != nil {
				t.Errorf("Should return 'nil' for tail next, got '%v'", s.tail.next)
			}
		}

		if i == size-1 {
			if s.head.next != nil {
				t.Errorf("Should return 'nil' for head next, got '%v'", s.head.next)
			}

			if s.head != s.tail {
				t.Errorf(
					"Should return same values for head and tail, got '%v' and '%v'",
					s.head,
					s.tail,
				)
			}
		}

		if i < size-2 && s.head.next != nodes[i+2] {
			t.Errorf(
				"Should return '%v' for head next, got '%v'",
				nodes[i+2],
				s.head.next,
			)
		}

		if i == size && (s.head != nil || s.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}
	}

	oldHead = s.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for old head, got '%v'", oldHead)
	}
}

func TestSDeleteTail(t *testing.T) {
	s := NewSingly()

	oldTail := s.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for old tail, got '%v'", oldTail)
	}

	nodes := []*SinglyNode{
		s.InsertHead(0),
		s.InsertHead(1),
		s.InsertHead(2),
		s.InsertHead(3),
		s.InsertHead(4),
	}
	size := len(nodes) - 1

	for i, node := range nodes {
		oldTail = s.DeleteTail()

		if oldTail != node {
			t.Errorf("Should return '%v' for old tail, got '%v'", node, oldTail)
		}

		if i != size {
			if s.head != nodes[size] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[size], s.head)
			}

			if s.tail != nodes[i+1] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[i+1], s.tail)
			}

			if s.tail.next != nil {
				t.Errorf("Should return 'nil' for tail next, got '%v'", s.tail.next)
			}
		}

		if i == size-1 {
			if s.head.next != nil {
				t.Errorf("Should return 'nil' for head next, got '%v'", s.head.next)
			}

			if s.head != s.tail {
				t.Errorf(
					"Should return same values for head and tail, got '%v' and '%v'",
					s.head,
					s.tail,
				)
			}
		}

		if i < size-2 && s.head.next != nodes[size-1] {
			t.Errorf(
				"Should return '%v' for head next, got '%v'",
				nodes[size-1],
				s.head.next,
			)
		}

		if i == size && (s.head != nil || s.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				s.head,
				s.tail,
			)
		}
	}

	oldTail = s.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for old tail, got '%v'", oldTail)
	}
}

func TestSLen(t *testing.T) {
	s := NewSingly()

	if count := s.Len(); count != 0 {
		t.Errorf("Should return '0', got '%d'", count)
	}

	s.InsertHead("a")
	s.InsertHead("b")
	s.InsertHead("c")

	if count := s.Len(); count != 3 {
		t.Errorf("Should return '3', got '%d'", count)
	}
}
