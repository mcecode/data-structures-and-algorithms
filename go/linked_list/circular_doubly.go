package linkedlist

type CircularDoubly struct {
	head *DoublyNode
	tail *DoublyNode
}

func NewCircularDoubly() *CircularDoubly {
	return &CircularDoubly{nil, nil}
}

func (cd *CircularDoubly) Head() *DoublyNode {
	return cd.head
}

func (cd *CircularDoubly) Tail() *DoublyNode {
	return cd.tail
}

func (cd *CircularDoubly) InsertHead(value interface{}) *DoublyNode {
	if cd.head == nil {
		cd.head = NewDoublyNode(value, nil, nil)
		cd.head.next = cd.head
		cd.head.prev = cd.head
		cd.tail = cd.head
		return cd.head
	}

	head := NewDoublyNode(value, cd.head, cd.tail)
	cd.head.prev = head
	cd.tail.next = head

	if cd.head == cd.tail {
		cd.tail.prev = head
	}

	cd.head = head
	return head
}

func (cd *CircularDoubly) InsertTail(value interface{}) *DoublyNode {
	if cd.head == nil {
		cd.head = NewDoublyNode(value, nil, nil)
		cd.head.next = cd.head
		cd.head.prev = cd.head
		cd.tail = cd.head
		return cd.head
	}

	tail := NewDoublyNode(value, cd.head, cd.tail)
	cd.head.prev = tail
	cd.tail.next = tail
	cd.tail = tail
	return tail
}

func (cd *CircularDoubly) DeleteHead() *DoublyNode {
	if cd.head == nil {
		return nil
	}

	oldHead := cd.head

	if cd.head == cd.tail {
		cd.head = nil
		cd.tail = nil
		return oldHead
	}

	cd.head = cd.head.next
	cd.head.prev = cd.tail
	cd.tail.next = cd.head
	return oldHead
}

func (cd *CircularDoubly) DeleteTail() *DoublyNode {
	if cd.head == nil {
		return nil
	}

	oldTail := cd.tail

	if cd.head == cd.tail {
		cd.head = nil
		cd.tail = nil
		return oldTail
	}

	cd.tail = cd.tail.prev
	cd.tail.next = cd.head
	cd.head.prev = cd.tail
	return oldTail
}

func (cd *CircularDoubly) Len() int {
	if cd.head == nil {
		return 0
	}

	len := 0

	node := cd.head
	for {
		len++
		node = node.next

		if node == cd.head {
			break
		}
	}

	return len
}
