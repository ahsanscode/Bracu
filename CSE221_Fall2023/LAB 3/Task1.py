def merge(a, b):
    # write your code here
    # Here a and b are two sorted list
    # merge function will return a sorted list after merging a and b
    len_a = len(a) - 1
    len_b = len(b) - 1
    idx_a = 0
    idx_b = 0
    marged_arr = []
    while idx_a <= len_a and idx_b <= len_b:
        temp1 = a[idx_a]
        temp2 = b[idx_b]
        if temp1 == temp2:
            marged_arr.append(temp1)
            marged_arr.append(temp2)
            idx_a += 1
            idx_b += 1
        if temp1 < temp2:
            marged_arr.append(temp1)
            idx_a += 1
        if temp1 > temp2:
            marged_arr.append(temp2)
            idx_b += 1
    rest_of_arr = None

    if idx_a <= len_a:
        rest_of_arr = (a, idx_a)
    elif idx_b <= len_b:
        rest_of_arr = (b, idx_b)
    if rest_of_arr == None:
        pass
    else:
        for var in range(rest_of_arr[1], len(rest_of_arr[0])):
            marged_arr.append(rest_of_arr[0][var])
    return marged_arr


def mergeSort(arr):
    if len(arr) <= 1:
        return arr
    else:
        mid = len(arr) // 2
        a1 = mergeSort(arr[0: mid])  # write the parameter
        a2 = mergeSort(arr[mid:])  # write the parameter
        return merge(a1, a2)  # complete the merge function above


with open('input1(4).txt', 'r') as input_file:
    with open('output1(4).txt', 'w') as output_file:
        n = int(input_file.readline())
        arr = list(map(int, input_file.readline().split()))
        arr = mergeSort(arr)
        output = ''
        for var in range(n):
            output += f'{arr[var]} '

        output_file.write(output.strip())
