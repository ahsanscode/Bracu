#  This code is the given algorithm in task 2

# def bubbleSort(arr):
#     for i in range(len(arr)-1):
#         for j in range(len(arr)-i-1):
#             if arr[j] > arr[j+1]:
#                 arr[j], arr[j+1] = arr[j+1], arr[j]

def bubbleSort(arr):
    for i in range(len(arr) - 1):
        boolian = False
        for j in range(len(arr) - i - 1):
            if arr[j] > arr[j + 1]:
                arr[j], arr[j + 1] = arr[j + 1], arr[j]
                boolian = True      # this line will update the uppe flag boolian which will denote that the array/list is not sorted and will not take n sqare time for outer boolian / flag  checking that will break the loop after fist itaration only if the array is previously sorted .
        if boolian == False:
            break


with open('input2(2).txt', 'r') as input_file:
    with open('output2(2).txt', 'w') as output_file:
        lenght = input_file.readline()
        arr = list(map(int, input_file.readline().split(' ')))
        bubbleSort(arr)
        output = ''
        for var in range(len(arr)):
            output += f'{arr[var]} '
        output = output.rstrip()
        output_file.write(output)
