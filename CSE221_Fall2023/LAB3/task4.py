def findmaximum(arry):
    a = len(arry)
    b = a // 2

    if a == 1:
        return -9999999
    if a == 2:
        return arry[0] + arry[1] ** 2

    left_max = findmaximum(arry[:b])
    right_max = findmaximum(arry[b:])

    maximum = max(arry[:b]) + (max(arry[b:], key=abs)) ** 2

    return max(left_max, right_max, maximum)


with open("input4(3).txt", "r") as input_file:
    with open("output4(3).txt", "w") as output_file:
        num = int(input_file.readline())
        arry = list(map(int, input_file.readline().split()))
        output_file.write(str(findmaximum(arry)))
