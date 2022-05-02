package linkedlist

import (
	"testing"
)

func TestNewCircularDoubly(t *testing.T) {
	cd := NewCircularDoubly()

	if cd.head != nil {
		t.Errorf("Should return 'nil' for linked list head, got '%v'", cd.head)
	}

	if cd.tail != nil {
		t.Errorf("Should return 'nil' for linked list tail, got '%v'", cd.tail)
	}
}

func TestCDInsertHead(t *testing.T) {

}

func TestCDInsertTail(t *testing.T) {

}

func TestCDDeleteHead(t *testing.T) {

}

func TestCDDeleteTail(t *testing.T) {

}

func TestCDLen(t *testing.T) {

}
