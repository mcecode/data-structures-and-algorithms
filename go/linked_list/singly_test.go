package linkedlist

import (
	"testing"
)

func TestNewSingly(t *testing.T) {
	s := NewSingly()

	if s.head != nil {
		t.Errorf("Should return 'nil' for linked list head, got '%v'", s.head)
	}

	if s.tail != nil {
		t.Errorf("Should return 'nil' for linked list tail, got '%v'", s.tail)
	}
}

func TestInsertHead(t *testing.T) {
	s := NewSingly()

	head := s.InsertHead("a")

	if s.head != head {
		t.Error("Should show that singly head is equal to head")
	}

	if s.tail != head {
		t.Error("Should show that singly tail is equal to head")
	}

	if head.data != "a" {
		t.Errorf("Should return 'a' for head data, got '%v'", head.data)
	}

	if head.next != nil {
		t.Errorf("Should return 'nil' for head next, got '%v'", head.next)
	}

	newHead := s.InsertHead("b")

	if s.head != newHead {
		t.Error("Should show that singly head is equal to new head")
	}

	if s.tail != head {
		t.Error("Should show that singly tail is equal to the original head")
	}

	if newHead.next != head {
		t.Errorf(
			"Should return the original head for new head next, got '%v'",
			newHead.next,
		)
	}
}

func TestInsertTail(t *testing.T) {
	s := NewSingly()

	tail := s.InsertTail("a")

	if s.head != tail {
		t.Error("Should show that singly head is equal to tail")
	}

	if s.tail != tail {
		t.Error("Should show that singly tail is equal to tail")
	}

	if tail.data != "a" {
		t.Errorf("Should return 'a' for tail data, got '%v'", tail.data)
	}

	if tail.next != nil {
		t.Errorf("Should return 'nil' for tail next, got '%v'", tail.next)
	}

	newTail := s.InsertTail("b")

	if s.head != tail {
		t.Error("Should show that singly head is equal to original tail")
	}

	if s.tail != newTail {
		t.Error("Should show that singly tail is equal to the new tail")
	}

	if tail.next != newTail {
		t.Errorf(
			"Should return the new tail for original tail next, got '%v'",
			newTail,
		)
	}
}

func TestDeleteHead(t *testing.T) {
	s := NewSingly()

	oldHead := s.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for deleted head, got '%v'", oldHead)
	}

	a := s.InsertHead("a")
	b := s.InsertHead("b")
	c := s.InsertHead("c")

	oldHead = s.DeleteHead()

	if oldHead != c {
		t.Errorf("Should return c node for deleted head, got '%v'", oldHead)
	}

	if s.head != b {
		t.Errorf("Should return b node as new head, got '%v'", s.head)
	}

	s.DeleteHead()

	if s.head != a || s.tail != a {
		t.Errorf(
			"Should show that both singly head and tail are equal to a node, "+
				"got '%v' and '%v'",
			s.head,
			s.tail,
		)
	}

	s.DeleteHead()

	if s.head != nil || s.tail != nil {
		t.Errorf(
			"Should show that both singly head and tail are equal to 'nil', "+
				"got '%v' and '%v'",
			s.head,
			s.tail,
		)
	}
}

func TestDeleteTail(t *testing.T) {
	s := NewSingly()

	oldTail := s.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for deleted tail, got '%v'", oldTail)
	}

	a := s.InsertHead("a")
	b := s.InsertHead("b")
	c := s.InsertHead("c")

	oldTail = s.DeleteTail()

	if oldTail != a {
		t.Errorf("Should return a node for deleted tail, got '%v'", oldTail)
	}

	if s.tail != b {
		t.Errorf("Should return b node as new tail, got '%v'", s.tail)
	}

	s.DeleteTail()

	if s.head != c || s.tail != c {
		t.Errorf(
			"Should show that both singly head and tail are equal to c node, "+
				"got '%v' and '%v'",
			s.head,
			s.tail,
		)
	}

	s.DeleteTail()

	if s.head != nil || s.tail != nil {
		t.Errorf(
			"Should show that both singly head and tail are equal to 'nil', "+
				"got '%v' and '%v'",
			s.head,
			s.tail,
		)
	}
}

func TestLen(t *testing.T) {
	s := NewSingly()

	if initialLen := s.Len(); initialLen != 0 {
		t.Errorf("Should return '0', got '%v'", initialLen)
	}

	s.InsertHead("a")
	s.InsertHead("b")
	s.InsertHead("c")

	if newLen := s.Len(); newLen != 3 {
		t.Errorf("Should return '3', got '%v'", newLen)
	}
}
