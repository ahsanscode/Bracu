def partition(a, l, r):
    pivot = a[r]
    i = l
    for var in range(l, r):
        if a[var] <= pivot:
            a[i], a[var] = a[var], a[i]
            i += 1
    a[i], a[r] = a[r], a[i]
    return i


def get_small(a, l, r, k):
    if k > 0 and k <= r - l + 1:
        idx = partition(a, l, r)
        if idx - l == k - 1:
            return a[idx]
        if idx - l > k - 1:
            return get_small(a, l, idx - 1, k)
        return get_small(a, idx + 1, r, k - idx + l - 1)


with open("input6.txt", "r") as input_file:
    with open("output6.txt", "w") as output_file:
        length = int(input_file.readline().split()[0])
        list1 = list(map(int, input_file.readline().split()))
        q = int(input_file.readline().split()[0])
        for var in range(q):
            k = int(input_file.readline())
            result = get_small(list1, 0, length - 1, k)
            output_file.write(f'{result}\n')
