with open('input3(2).txt', 'r') as input_file:
    with open('output3(2).txt', 'w') as output_file:
        lenght = int(input_file.readline())
        arr_id = input_file.readline().split(' ')
        arr_mark = input_file.readline().split(' ')
        for var in range(lenght):
            arr_id[var] = int(arr_id[var])
            arr_mark[var] = int(arr_mark[var])

        for i in range(lenght - 1):
            boolian = False
            for j in range(lenght - i - 1):
                if arr_mark[j] < arr_mark[j + 1]:
                    arr_mark[j], arr_mark[j + 1] = arr_mark[j + 1], arr_mark[j]
                    arr_id[j], arr_id[j + 1] = arr_id[j + 1], arr_id[j]
                    boolian = True
                if (arr_mark[j] == arr_mark[j + 1] and arr_id[j] > arr_id[j + 1]):
                    arr_mark[j], arr_mark[j + 1] = arr_mark[j + 1], arr_mark[j]
                    arr_id[j], arr_id[j + 1] = arr_id[j + 1], arr_id[j]
                    boolian = True
            if boolian == False:
                break

        for var in range(lenght):
            output_file.write(f'ID: {arr_id[var]} Mark: {arr_mark[var]}\n')
