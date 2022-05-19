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
	nodes := []*DoublyNode{
		cd.InsertTail(0),
		cd.InsertTail(1),
		cd.InsertTail(2),
		cd.InsertTail(3),
		cd.InsertTail(4),
	}

	if cd.head != nodes[0] {
		t.Errorf("Should return '%v' for head, got '%v'", nodes[0], cd.head)
	}

	if cd.tail != nodes[len(nodes)-1] {
		t.Errorf(
			"Should return '%v' for tail, got '%v'",
			nodes[len(nodes)-1],
			cd.tail,
		)
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

		if i != len(nodes)-1 && node.next != nodes[i+1] {
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

func TestCDDeleteHead(t *testing.T) {
	cd := NewCircularDoubly()

	oldHead := cd.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for old head, got '%v'", oldHead)
	}

	nodes := []*DoublyNode{
		cd.InsertTail(0),
		cd.InsertTail(1),
		cd.InsertTail(2),
		cd.InsertTail(3),
		cd.InsertTail(4),
	}
	len := len(nodes) - 1

	for i, node := range nodes {
		oldHead = cd.DeleteHead()

		if oldHead != node {
			t.Errorf("Should return '%v' for old head, got '%v'", node, oldHead)
		}

		if i != len {
			if cd.head != nodes[i+1] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[i+1], cd.head)
			}

			if cd.head.prev != nodes[len] {
				t.Errorf(
					"Should return '%v' for head prev, got '%v'",
					nodes[len],
					cd.head.prev,
				)
			}

			if cd.tail != nodes[len] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[len], cd.tail)
			}

			if cd.tail.next != nodes[i+1] {
				t.Errorf(
					"Should return '%v' for tail next, got '%v'",
					nodes[i+1],
					cd.tail.next,
				)
			}
		}

		if i < len-2 {
			if cd.head.next != nodes[i+2] {
				t.Errorf(
					"Should return '%v' for head next, got '%v'",
					nodes[i+2],
					cd.head.next,
				)
			}

			if cd.tail.prev != nodes[len-1] {
				t.Errorf(
					"Should return '%v' for tail prev, got '%v'",
					nodes[len-1],
					cd.tail.prev,
				)
			}
		}

		if i == len-1 {
			if cd.head.next != nodes[len] {
				t.Errorf(
					"Should return '%v' for head next, got '%v'",
					nodes[len],
					cd.head.next,
				)
			}

			if cd.tail.prev != nodes[len] {
				t.Errorf(
					"Should return '%v' for tail prev, got '%v'",
					nodes[len],
					cd.tail.prev,
				)
			}

			if cd.head != cd.tail {
				t.Errorf(
					"Should return same values for head and tail, got '%v' and '%v'",
					cd.head,
					cd.tail,
				)
			}
		}

		if i == len && (cd.head != nil || cd.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				cd.head,
				cd.tail,
			)
		}
	}

	oldHead = cd.DeleteHead()

	if oldHead != nil {
		t.Errorf("Should return 'nil' for old head, got '%v'", oldHead)
	}
}

func TestCDDeleteTail(t *testing.T) {
	cd := NewCircularDoubly()

	oldTail := cd.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for old tail, got '%v'", oldTail)
	}

	nodes := []*DoublyNode{
		cd.InsertHead(0),
		cd.InsertHead(1),
		cd.InsertHead(2),
		cd.InsertHead(3),
		cd.InsertHead(4),
	}
	len := len(nodes) - 1

	for i, node := range nodes {
		oldTail = cd.DeleteTail()

		if oldTail != node {
			t.Errorf("Should return '%v' for old tail, got '%v'", node, oldTail)
		}

		if i != len {
			if cd.head != nodes[len] {
				t.Errorf("Should return '%v' for head, got '%v'", nodes[len], cd.head)
			}

			if cd.head.prev != nodes[i+1] {
				t.Errorf(
					"Should return '%v' for head prev, got '%v'",
					nodes[i+1],
					cd.head.prev,
				)
			}

			if cd.tail != nodes[i+1] {
				t.Errorf("Should return '%v' for tail, got '%v'", nodes[i+1], cd.tail)
			}

			if cd.tail.next != nodes[len] {
				t.Errorf(
					"Should return '%v' for tail next, got '%v'",
					nodes[len],
					cd.tail.next,
				)
			}
		}

		if i < len-2 {
			if cd.head.next != nodes[len-1] {
				t.Errorf(
					"Should return '%v' for head next, got '%v'",
					nodes[len-1],
					cd.head.next,
				)
			}

			if cd.tail.prev != nodes[i+2] {
				t.Errorf(
					"Should return '%v' for tail prev, got '%v'",
					nodes[i+2],
					cd.tail.prev,
				)
			}
		}

		if i == len-1 {
			if cd.head.next != nodes[len] {
				t.Errorf(
					"Should return '%v' for head next, got '%v'",
					nodes[len],
					cd.head.next,
				)
			}

			if cd.tail.prev != nodes[len] {
				t.Errorf(
					"Should return '%v' for tail prev, got '%v'",
					nodes[len],
					cd.tail.prev,
				)
			}

			if cd.head != cd.tail {
				t.Errorf(
					"Should return same values for head and tail, got '%v' and '%v'",
					cd.head,
					cd.tail,
				)
			}
		}

		if i == len && (cd.head != nil || cd.tail != nil) {
			t.Errorf(
				"Should return 'nil' for head and tail, got '%v' and '%v'",
				cd.head,
				cd.tail,
			)
		}
	}

	oldTail = cd.DeleteTail()

	if oldTail != nil {
		t.Errorf("Should return 'nil' for old tail, got '%v'", oldTail)
	}
}

func TestCDLen(t *testing.T) {
	cd := NewCircularDoubly()

	if len := cd.Len(); len != 0 {
		t.Errorf("Should return '0', got '%v'", len)
	}

	cd.InsertHead("a")
	cd.InsertHead("b")
	cd.InsertHead("c")

	if len := cd.Len(); len != 3 {
		t.Errorf("Should return '3', got '%v'", len)
	}
}
