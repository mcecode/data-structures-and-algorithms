package queue

import (
	"testing"
)

const emptyQueueError string = "queue is empty"

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
	head, headErr := PeekHead()
	tail, tailErr := PeekTail()

	if head != "a" || tail != "a" {
		t.Errorf(
			"Should return 'a' for head and tail, got '%v' and '%v'",
			head,
			tail,
		)
	}

	if headErr != nil || tailErr != nil {
		t.Errorf(
			"Should return 'nil' for headErr and tailErr, got '%v' and '%v'",
			headErr,
			tailErr,
		)
	}

	Enqueue("b")
	Enqueue("c")
	head, headErr = PeekHead()
	tail, tailErr = PeekTail()

	if head != "a" {
		t.Errorf("Should return 'a' for head, got '%v'", head)
	}

	if tail != "c" {
		t.Errorf("Should return 'c' for head, got '%v'", tail)
	}

	if headErr != nil || tailErr != nil {
		t.Errorf(
			"Should return 'nil' for headErr and tailErr, got '%v' and '%v'",
			headErr,
			tailErr,
		)
	}
}

func TestDequeue(t *testing.T) {
	data, err := Dequeue()

	if data != "a" {
		t.Errorf("Should return 'a' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	head, headErr := PeekHead()
	tail, tailErr := PeekTail()

	if head != "b" {
		t.Errorf("Should return 'b' for head, got '%v'", head)
	}

	if tail != "c" {
		t.Errorf("Should return 'c' for head, got '%v'", tail)
	}

	if headErr != nil || tailErr != nil {
		t.Errorf(
			"Should return 'nil' for headErr and tailErr, got '%v' and '%v'",
			headErr,
			tailErr,
		)
	}

	Dequeue()
	data, err = Dequeue()

	if data != "c" {
		t.Errorf("Should return 'c' for data, got '%v'", data)
	}

	if err != nil {
		t.Errorf("Should return 'nil' for err, got '%v'", err)
	}

	data, err = Dequeue()

	if data != nil {
		t.Errorf("Should return 'nil' for data, got '%v'", data)
	}

	if err.Error() != emptyQueueError {
		t.Errorf("Should return '%s' for err, got '%v'", emptyQueueError, err)
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
