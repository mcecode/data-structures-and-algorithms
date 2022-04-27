package linkedlist

type Singly struct {
	head *SinglyNode
	tail *SinglyNode
}

func NewSingly() *Singly {
	return &Singly{nil, nil}
}

func (s *Singly) Head() *SinglyNode {
	return s.head
}

func (s *Singly) Tail() *SinglyNode {
	return s.tail
}

func (s *Singly) InsertHead(value interface{}) *SinglyNode {
	if s.head == nil {
		s.head = NewSinglyNode(value, nil)
		s.tail = s.head
		return s.head
	}

	s.head = NewSinglyNode(value, s.head)
	return s.head
}

func (s *Singly) InsertTail(value interface{}) *SinglyNode {
	if s.head == nil {
		s.head = NewSinglyNode(value, nil)
		s.tail = s.head
		return s.head
	}

	s.tail.next = NewSinglyNode(value, nil)
	s.tail = s.tail.next
	return s.tail
}

func (s *Singly) DeleteHead() *SinglyNode {
	if s.head == nil {
		return nil
	}

	if s.head == s.tail {
		oldHead := s.head
		s.head = nil
		s.tail = nil
		return oldHead
	}

	oldHead := s.head
	s.head = s.head.next
	return oldHead
}

func (s *Singly) DeleteTail() *SinglyNode {
	if s.head == nil {
		return nil
	}

	if s.head == s.tail {
		oldHead := s.head
		s.head = nil
		s.tail = nil
		return oldHead
	}

	var oldTail *SinglyNode
	for node := s.head; node != nil; node = node.next {
		if node.next == s.tail {
			oldTail = s.tail
			node.next = nil
			s.tail = node
			break
		}
	}
	return oldTail
}

func (s *Singly) Len() int {
	len := 0

	for node := s.head; node != nil; node = node.next {
		len++
	}

	return len
}
