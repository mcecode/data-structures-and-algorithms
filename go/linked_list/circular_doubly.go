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

	cd.head = NewDoublyNode(value, cd.head, cd.tail)
	return cd.head
}

func (cd *CircularDoubly) InsertTail(value interface{}) *DoublyNode {
	return NewDoublyNode(value, nil, nil)
}

func (cd *CircularDoubly) DeleteHead() *DoublyNode {
	return NewDoublyNode(nil, nil, nil)
}

func (cd *CircularDoubly) DeleteTail() *DoublyNode {
	return NewDoublyNode(nil, nil, nil)
}

func (cd *CircularDoubly) Len() int {
	return 0
}
