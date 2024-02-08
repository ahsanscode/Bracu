class Node:
    def __init__(self, elem, next=None):
        self.elem = elem
        self.next = next
        self.colour = None


with open('input3(4).txt', 'r') as input_file:
    with open('output3(4).txt', 'w') as output_file:
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

        output = ''


        def dfs(head):
            global output
            output += f'{head} '
            adj_MTX[head].colour = 0
            temp = adj_MTX[head]
            while temp != None:
                if adj_MTX[temp.elem].colour == None:
                    dfs(temp.elem)
                temp = temp.next


        dfs(1)
        output_file.write(output.strip())
