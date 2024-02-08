class Node:
    def __init__(self, elem, next=None):
        self.elem = elem
        self.next = next
        self.colour = None


with open('input4(5).txt', 'r') as input_file:
    with open('output4(5).txt', 'w') as output_file:
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

        arr = [False] * (a + 1)

        Recursion_brecker = False
        def dfs(head):
            global arr
            global Recursion_brecker

            arr[head] = True
            if adj_MTX[head] == 0:
                pass
            elif adj_MTX[head].colour == None:
                adj_MTX[head].colour = 0
            elif adj_MTX[head].colour > a :
                return True
            else:
                adj_MTX[head].colour +=1
            temp = adj_MTX[head]

            while temp != None:
                if temp == 0:
                    break
                if arr[temp.elem] == True:
                    return True
                if arr[temp.elem] == False:
                    if dfs(temp.elem) == True:
                        return True
                    arr[temp.elem] = False
                temp = temp.next

            arr = [False] * (a + 1)


        def is_cycle(adj_list):
            boolian = False
            for var in range(1,a+1):
                if dfs(var) == True:
                    output_file.write('YES')
                    boolian = True
                    break
                arr = [False] * (a + 1)
            if boolian == False:
                output_file.write('No')



        is_cycle(adj_MTX)
