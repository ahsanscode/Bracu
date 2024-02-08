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


# code for O(NlogN)
with open('input2(4).txt', 'r') as input_file:
    with open('output2(4)NlogN.txt', 'w') as output_file:
        alice_len = int(input_file.readline())
        alice_list = list(map(int, input_file.readline().split(' ')))
        bob_len = int(input_file.readline())
        bob_list = list(map(int, input_file.readline().split(' ')))
        arr = alice_list + bob_list
        output = mergeSort(arr)
        out_str = ''
        for var in range(alice_len + bob_len):
            out_str += f'{output[var]} '
        output_file.write(out_str)

# code for O(N)
with open('input2(4).txt', 'r') as input_file:
    with open('output2(4)N.txt', 'w') as output_file:
        alice_len = int(input_file.readline())
        alice_list = list(map(int, input_file.readline().split(' ')))
        bob_len = int(input_file.readline())
        bob_list = list(map(int, input_file.readline().split(' ')))
        output = merge(alice_list, bob_list)
        out_str = ''
        for var in range(alice_len + bob_len):
            out_str += f'{output[var]} '
        output_file.write(out_str)
