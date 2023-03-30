import { useEffect, useState } from 'react';

interface Todo {
  id: string;
  text: string;
  done: boolean;
  createdAt: string;
  updatedAt: string;
}

export default function ListTodo() {
  const [todos, setTodos] = useState<Todo[] | []>([]);

  useEffect(() => {
    // fetch todos from server
  }, [todos]);

  if (todos.length === 0) {
    return (
      <div className="max-w-7xl mx-auto">
        <p>No tasks</p>
      </div>
    );
  }
  return (
    <div className="max-w-7xl mx-auto">
      <ul role="list" className="divide-y divide-gray-200">
        {todos.map((todo: Todo) => (
          <li key={todo.id} className="py-4">
            <div className="flex space-x-3">
              <div className="flex-1 space-y-1">
                <div className="flex items-center justify-between">
                  <h3
                    className={`${
                      todo.done && 'line-through'
                    } text-sm font-medium`}
                  >
                    {todo.text}
                  </h3>
                </div>
                <p className="text-sm text-gray-500">
                  Create at: {new Date(todo.createdAt).toLocaleDateString()} -
                  Update at: {new Date(todo.updatedAt).toLocaleDateString()}
                </p>
              </div>
            </div>
          </li>
        ))}
      </ul>
    </div>
  );
}
