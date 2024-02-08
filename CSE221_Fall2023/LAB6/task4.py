class num_class:
    def __init__(self, v6):
        self.road = list(range(v6))
        self.rank = [0] * v6

    def cities(self, x):
        if self.road[x] != x:
            self.road[x] = self.cities(self.road[x])
        return self.road[x]

    def roads(self, x, y):
        r1 = self.cities(x)
        r2 = self.cities(y)
        if r1 == r2:
            return False
        if self.rank[r1] < self.rank[r2]:
            r1, r2 = r2, r1
        self.road[r2] = r1
        if self.rank[r1] == self.rank[r2]:
            self.rank[r1] += 1
        return True


with open('input4(2).txt', 'r') as input_file:
    with open('output4(2).txt', 'w') as output_file:
        n, m = map(int, input_file.readline().split())
        edges = []
        for var in range(m):
            ra, rb, rc = map(int, input_file.readline().split())
            edges.append((rc, ra - 1, rb - 1))
        edges.sort()
        my_nums = num_class(n)
        weig_count = 0
        edge_count = []
        for rc, ra, rb in edges:
            if my_nums.roads(ra, rb):
                weig_count += rc
                edge_count.append((ra, rb))
        find_cost = float('inf')
        for ra, rb in edge_count:
            my_nums = num_class(n)
            after = 0
            for rc, i, j in edges:
                if (i, j) == (ra, rb) or (i, j) == (rb, ra):
                    continue
                if my_nums.roads(i, j):
                    after += rc
            cost_lowered = weig_count - after
            if cost_lowered < find_cost:
                find_cost = cost_lowered
        output_file.write(str(weig_count - find_cost))
