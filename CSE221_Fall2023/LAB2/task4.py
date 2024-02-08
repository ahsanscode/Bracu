with open('input4(1).txt', 'r') as input_file:
    with open(f'output4(1).txt', 'w') as output_file:
        n, p = map(int, input_file.readline().split())
        time_slots = []
        for var in range(n):
            time_slots.append(tuple(map(int, input_file.readline().split())))
        time_slots.sort(key=lambda x: x[1])
        count = 0

        arr_p = []
        for var in range(p):
            arr_p.append(time_slots[var])
            count += 1
        for var in range(n):
            if time_slots[var] == None:
                continue
            new_start, new_end = time_slots[var]
            temp = None
            boolian = False
            for i in range(p):
                pre_start, pre_end = arr_p[i]
                if new_start >= pre_end and new_start < new_end:
                    diff = new_start - pre_end
                    boolian = True
                    if temp == None:
                        temp = (i, diff)
                    else:
                        if temp[1] > diff:
                            temp = (i, diff)
            if boolian == True:
                arr_p[temp[0]] = time_slots[var]
                count += 1

        output_file.write(f'{count}\n')

