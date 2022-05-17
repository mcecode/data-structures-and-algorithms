package linkedlist

import (
	"testing"
)

func TestNewCircularDoubly(t *testing.T) {
	cd := NewCircularDoubly()

	if cd.head != nil {
		t.Errorf("Should return 'nil' for head, got '%v'", cd.head)
	}

	if cd.tail != nil {
		t.Errorf("Should return 'nil' for tail, got '%v'", cd.tail)
	}
}

func TestCDInsertHead(t *testing.T) {
	cd := NewCircularDoubly()
	nodes := []*DoublyNode{
		cd.InsertHead(0),
		cd.InsertHead(1),
		cd.InsertHead(2),
		cd.InsertHead(3),
		cd.InsertHead(4),
	}

	if cd.head != nodes[len(nodes)-1] {
		t.Errorf(
			"Should return '%v' for head, got '%v'",
			nodes[len(nodes)-1],
			cd.head,
		)
	}

	if cd.tail != nodes[0] {
		t.Errorf("Should return '%v' for tail, got '%v'", nodes[0], cd.tail)
	}

	if cd.head.prev != cd.tail {
		t.Errorf(
			"Should return '%v' for head prev, got '%v'",
			cd.tail,
			cd.head.prev,
		)
	}

	if cd.tail.next != cd.head {
		t.Errorf(
			"Should return '%v' for tail next, got '%v'",
			cd.head,
			cd.tail.next,
		)
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

		if i != len(nodes)-1 && node.prev != nodes[i+1] {
			t.Errorf(
				"Should return '%v' for node prev, got '%v'",
				nodes[i+1],
				node.prev,
			)
		}
	}
}

func TestCDInsertTail(t *testing.T) {
	cd := NewCircularDoubly()

	var head *DoublyNode
	var prev *DoublyNode

	for i, value := range []string{"a", "b", "c", "d", "e"} {
		tail := cd.InsertTail(value)

		if i == 0 {
			head = tail
			prev = tail
		}

		if tail.data != value {
			t.Errorf("Should return '%s' for tail data, got '%v'", value, tail.data)
		}

		if tail.next != head {
			t.Errorf("Should return '%v' for tail next, got '%v'", head, tail.next)
		}

		if tail.prev != prev {
			t.Errorf("Should return '%v' for tail prev, got '%v'", prev, tail.prev)
		}

		if cd.head != head {
			t.Errorf("Should return '%v' for head, got '%v'", head, cd.head)
		}

		if cd.tail != tail {
			t.Errorf("Should return '%v' for tail, got '%v'", tail, cd.tail)
		}

		prev = tail
	}
}

func TestCDDeleteHead(t *testing.T) {

}

func TestCDDeleteTail(t *testing.T) {

}

func TestCDLen(t *testing.T) {

}
