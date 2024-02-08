with open('input1(2).txt', 'r') as input_file:
    with open('output1(2).txt', 'w') as output_file:
        num_vertices, num_edges = map(int, input_file.readline().split(' '))
        graph_data = {}
        shortest_distances = {}
        visited_nodes = []

        for var in range(1, num_vertices + 1):
            shortest_distances[var] = float('inf')

        for i in range(num_edges):
            src, dest, weight = list(map(int, input_file.readline().strip('\n').split(' ')))
            if src in graph_data:
                graph_data[src].append((dest, weight))
            else:
                graph_data[src] = [(dest, weight)]

        source_node = int(input_file.readline())
        shortest_distances[source_node] = 0


        def dijkstra(graph, starting_node=None):
            global visited_nodes
            global source_node

            if starting_node is None:
                starting_node = source_node

            if starting_node in graph_data and starting_node not in visited_nodes:
                visited_nodes.append(starting_node)
                starting_node_distance = shortest_distances[starting_node]
                neighbours = graph_data[starting_node]
                min_neighbour_dist = float('inf')
                min_neighbour = None

                for var in neighbours:
                    neighbour = var[0]
                    neighbour_distance = var[1]
                    distance_from_starting = starting_node_distance + neighbour_distance

                    if distance_from_starting < shortest_distances[neighbour]:
                        shortest_distances[neighbour] = distance_from_starting

                    if neighbour not in visited_nodes and neighbour_distance < min_neighbour_dist:
                        min_neighbour_dist = neighbour_distance
                        min_neighbour = neighbour

                dijkstra(graph, min_neighbour)
            else:
                return


        dijkstra(graph_data)
        for var in range(1, num_vertices + 1):
            if var not in visited_nodes:
                dijkstra(graph_data, var)

        for var in shortest_distances:
            if shortest_distances[var] == float('inf'):
                output_file.write('-1 ')
            else:
                output_file.write(str(shortest_distances[var]) + ' ')
