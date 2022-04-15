package queue

import (
	"errors"
)

var queue []interface{}
var errEmptyQueue error = errors.New("queue is empty")

func PeekHead() (interface{}, error) {
	if Len() > 0 {
		return queue[0], nil
	}

	return nil, errEmptyQueue
}

func PeekTail() (interface{}, error) {
	if Len() > 0 {
		return queue[Len()-1], nil
	}

	return nil, errEmptyQueue
}

func Enqueue(value interface{}) {
	queue = append(queue, value)
}

func Dequeue() (interface{}, error) {
	if Len() > 0 {
		data := queue[0]
		queue = queue[1:]
		return data, nil
	}

	return nil, errEmptyQueue
}

func Len() int {
	return len(queue)
}
