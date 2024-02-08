def merge(a, b):
    # write your code here
    # Here a and b are two sorted list
    # merge function will return a sorted list after merging a and b
    len_a = len(a) - 1
    len_b = len(b) - 1
    idx_a = 0
    idx_b = 0
    marged_arr = []
    count = 0
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
            count += len(a) - idx_a
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
    return (marged_arr, count)


def mergeSort(arr):
    if len(arr) <= 1:
        return (arr, 0)
    else:
        mid = len(arr) // 2
        a1, c1 = mergeSort(arr[0: mid])  # write the parameter
        a2, c2 = mergeSort(arr[mid:])  # write the parameter
        marged, count = merge(a1, a2)
        return (marged, (count + c1 + c2))  # complete the merge function above


with open('input3(3).txt', 'r') as input_file:
    with open('output3(3).txt', 'w') as output_file:
        n = int(input_file.readline().strip())
        arr, c = mergeSort(list(map(int, input_file.readline().split())))
        output_file.write(f'{c}\n')
