class Node:
    def __init__(self, elem, next=None):
        self.elem = elem
        self.next = next
        self.level = None
        self.parrent = None


def bfs(adj_mtx, a):
    arr = [None] * (a + 1)
    arr[0] = 1
    adj_mtx[arr[0]].level = 0
    adj_mtx[arr[0]].parrent = arr[0]
    i = 0
    idx = 1
    x = []
    while arr[i] != None:
        x.append(arr[i])  # arr[i] ====== parrent
        current = adj_mtx[arr[i]]
        while current != None:
            if current.elem not in arr:
                arr[idx] = current.elem
                adj_mtx[current.elem].level = adj_mtx[arr[i]].level + 1
                adj_mtx[current.elem].parrent = arr[i]
                idx += 1
            current = current.next
        i += 1


with open('input5(5).txt', 'r') as input_file:
    with open('output5(5).txt', 'w') as output_file:
        a, b, c = map(int, input_file.readline().split())
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
        if c != 1:
            bfs(adj_MTX, a)
        else:
            adj_MTX[1].level = 0
            adj_MTX[1].parrent = 1
        output_file.write(f'Time: {adj_MTX[c].level}\n')

        temp = adj_MTX[c]
        outx = 'Shortest Path: '
        out = ''
        if c != 1:
            out += f'{c}'

        while temp.parrent != 1:
            out = f'{temp.parrent} ' + out
            temp = adj_MTX[temp.parrent]
        out = f'{temp.parrent} ' + out
        output_file.write(outx + out)
