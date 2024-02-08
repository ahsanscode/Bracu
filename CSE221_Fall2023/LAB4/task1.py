class Node:
    def __init__(self, elem, next=None):
        self.elem = elem
        self.next = next


with open('input1A(2).txt', 'r') as input_file:
    with open('output1A(2).txt', 'w') as output_file:
        a, b = map(int, input_file.readline().split())
        adj_MTX = [[0] * (a + 1) for var in range(a + 1)]
        for var in range(b):
            x, y, z = map(int, input_file.readline().split())
            adj_MTX[x][y] = z
        for var in range(len(adj_MTX)):
            output = ''
            for i in range(len(adj_MTX[var])):
                output += f'{adj_MTX[var][i]} '
            output_file.write(output[:-1] + '\n')
with open('input1B(3).txt', 'r') as input_file:
    with open('output1B(3).txt', 'w') as output_file:
        a, b = map(int, input_file.readline().split())
        adj_MTX = [0 for var in range(a + 1)]
        for var in range(b):
            x, y, z = map(int, input_file.readline().split())
            if adj_MTX[x] == 0:
                adj_MTX[x] = Node((y, z))
            else:
                current = adj_MTX[x]
                while current.next != None:
                    current = current.next
                current.next = Node((y, z))

        for var in range(a + 1):
            if adj_MTX[var] == 0:
                output_file.write(f'{var} :\n')
            else:
                output = ''
                output += f'{var} : '
                current = adj_MTX[var]
                while current != None:
                    output += f'{current.elem} '
                    current = current.next
                # output += '\n'
                output_file.write(f'{output}\n')
