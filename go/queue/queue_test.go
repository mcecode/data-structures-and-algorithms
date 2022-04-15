package queue

import (
	"testing"
)

var emptyQueueError string = "queue is empty"

func TestEmptyQueue(t *testing.T) {
	head, headErr := PeekHead()
	tail, tailErr := PeekTail()

	if head != nil ||
		tail != nil ||
		headErr.Error() != emptyQueueError ||
		tailErr.Error() != emptyQueueError {
		t.Error("Should return values that indicate queue is empty")
	}
}

func TestEnqueue(t *testing.T) {
	Enqueue("a")
	head, _ := PeekHead()
	tail, _ := PeekTail()

	if head != "a" || tail != "a" {
		t.Errorf(
			"Should return 'a' for head and tail, got '%v' and '%v'",
			head,
			tail,
		)
	}

	Enqueue("b")
	Enqueue("c")
	head, _ = PeekHead()
	tail, _ = PeekTail()

	if head != "a" {
		t.Errorf("Should return 'a' for head, got '%v'", head)
	}

	if tail != "c" {
		t.Errorf("Should return 'c' for head, got '%v'", tail)
	}
}

func TestDequeue(t *testing.T) {
	data, err := Dequeue()

	if data != "a" {
		t.Errorf("Should return 'a' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for error, got '%v'", err)
	}

	Dequeue()
	data, err = Dequeue()

	if data != "c" {
		t.Errorf("Should return 'c' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for error, got '%v'", err)
	}

	data, err = Dequeue()

	if data != nil {
		t.Errorf("Should return 'nil' for data, got '%v'", data)
	}

	if err.Error() != emptyQueueError {
		t.Errorf("Should return '%s' for error, got '%v'", emptyQueueError, err)
	}
}

func TestLen(t *testing.T) {
	if initialLen := Len(); initialLen != 0 {
		t.Errorf("Should return '0', got '%d'", initialLen)
	}

	Enqueue("a")
	Enqueue("b")
	Enqueue("c")

	if newLen := Len(); newLen != 3 {
		t.Errorf("Should return '3', got '%d'", newLen)
	}
}
