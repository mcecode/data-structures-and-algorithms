package linkedlist

type Singly struct {
	head *SinglyNode
	tail *SinglyNode
}

func NewSingly() *Singly {
	return &Singly{nil, nil}
}

func (ll *Singly) InsertHead(value interface{}) *SinglyNode {
	return NewSinglyNode(nil, nil)
}

func (ll *Singly) InsertTail(value interface{}) *SinglyNode {
	return NewSinglyNode(nil, nil)
}

func (ll *Singly) DeleteHead() *SinglyNode {
	return NewSinglyNode(nil, nil)
}

func (ll *Singly) DeleteTail() *SinglyNode {
	return NewSinglyNode(nil, nil)
}

func (ll *Singly) Len() int {
	return 0
}
