with open('input5(4).txt', 'r') as input_file:
    with open('output5(4).txt', 'w') as output_file:
        p = int(input_file.readline())
        list1 = list(map(int, input_file.readline().split()))


        def quick_sort(a, p, r):
            if p < r:
                q = partition(a, p, r)
                quick_sort(a, p, q - 1)
                quick_sort(a, q + 1, r)


        def partition(a, p, r):
            x = a[r]
            i = p - 1
            for var in range(p, r):
                if a[var] < x:
                    i = i + 1
                    a[i], a[var] = a[var], a[i]
                    a[i + 1], a[r] = a[r], a[i + 1]
            return i + 1


        quick_sort(list1, 0, len(list1) - 1)
        output = ''
        for var in range(p):
            output += f'{list1[var]} '
        output_file.write(output.strip())

