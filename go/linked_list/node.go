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
