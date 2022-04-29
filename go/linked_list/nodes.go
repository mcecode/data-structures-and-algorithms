package linkedlist

type SinglyNode struct {
	data interface{}
	next *SinglyNode
}

func NewSinglyNode(value interface{}, next *SinglyNode) *SinglyNode {
	return &SinglyNode{value, next}
}

func (n *SinglyNode) Data() interface{} {
	return n.data
}

func (n *SinglyNode) Next() *SinglyNode {
	return n.next
}

type DoublyNode struct {
	data interface{}
	next *DoublyNode
	prev *DoublyNode
}

func NewDoublyNode(
	value interface{},
	next *DoublyNode,
	prev *DoublyNode,
) *DoublyNode {
	return &DoublyNode{value, next, prev}
}

func (n *DoublyNode) Data() interface{} {
	return n.data
}

func (n *DoublyNode) Next() *DoublyNode {
	return n.next
}

func (n *DoublyNode) Prev() *DoublyNode {
	return n.prev
}
