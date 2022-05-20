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

	oldHead := s.head

	if s.head == s.tail {
		s.head = nil
		s.tail = nil
		return oldHead
	}

	s.head = s.head.next
	return oldHead
}

func (s *Singly) DeleteTail() *SinglyNode {
	if s.head == nil {
		return nil
	}

	oldTail := s.tail

	if s.head == s.tail {
		s.head = nil
		s.tail = nil
		return oldTail
	}

	for node := s.head; node != nil; node = node.next {
		if node.next == s.tail {
			s.tail = node
			s.tail.next = nil
			break
		}
	}
	return oldTail
}

func (s *Singly) Len() int {
	count := 0

	for node := s.head; node != nil; node = node.next {
		count++
	}

	return count
}
