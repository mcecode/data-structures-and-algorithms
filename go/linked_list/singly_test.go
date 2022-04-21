package linkedlist

import (
	"testing"
)

func TestNewSingly(t *testing.T) {
	ll := NewSingly()

	if ll.head != nil {
		t.Errorf("Should return 'nil' for linked list head, got '%v'", ll.head)
	}

	if ll.tail != nil {
		t.Errorf("Should return 'nil' for linked list tail, got '%v'", ll.tail)
	}
}

func TestInsertHead(t *testing.T) {

}

func TestInsertTail(t *testing.T) {

}

func TestDeleteHead(t *testing.T) {

}

func TestDeleteTail(t *testing.T) {

}

func TestLen(t *testing.T) {

}
