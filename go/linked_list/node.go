package linkedlist

type SinglyNode struct {
	data interface{}
	next *SinglyNode
}

func NewSinglyNode(value interface{}, next *SinglyNode) *SinglyNode {
	return &SinglyNode{value, next}
}
