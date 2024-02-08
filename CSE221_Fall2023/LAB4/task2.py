class Node:
    def __init__(self, elem, next=None):
        self.elem = elem
        self.next = next


def bfs(adj_mtx, a):
    arr = [None] * (a + 1)
    arr[0] = 1
    i = 0
    idx = 1
    x = ''
    while arr[i] != None:
        x += str(arr[i]) + ' '
        current = adj_mtx[arr[i]]
        while current != None:
            if current.elem not in arr:
                arr[idx] = current.elem
                idx += 1
            current = current.next
        i += 1
    return (x.strip())


with open('input2(4).txt', 'r') as input_file:
    with open('output2(4).txt', 'w') as output_file:
        a, b = map(int, input_file.readline().split())
        adj_MTX = [0 for var in range(a + 1)]
        for var in range(b):
            x, y = map(int, input_file.readline().split())
            if adj_MTX[x] == 0:
                adj_MTX[x] = Node(y)
            else:
                current = adj_MTX[x]
                while current.next != None:
                    current = current.next
                current.next = Node(y)
            if adj_MTX[y] == 0:
                adj_MTX[y] = Node(x)
            else:
                current = adj_MTX[y]
                while current.next != None:
                    current = current.next
                current.next = Node(x)
        output_file.write(bfs(adj_MTX, a))
