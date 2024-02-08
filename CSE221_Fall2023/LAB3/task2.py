def max_func(arr):
    if len(arr) <= 1:
        return arr[0]
    else:
        mid = len(arr) // 2
        a1 = max_func(arr[0: mid])
        a2 = max_func(arr[mid:])
        if a1 > a2:
            return a1
        else:
            return a2

with open(f'input2(4).txt','r') as input_file:
    with open(f'output2(4).txt','w') as output_file:
        n =  int(input_file.readline())
        arr = list(map(int,input_file.readline().split()))
        output_file.write(f'{max_func(arr)}\n')


